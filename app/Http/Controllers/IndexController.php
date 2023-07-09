<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Services\QuestionService;
use App\Services\UserService;
use App\Services\ValidatorService;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Validator;

class IndexController extends Controller
{
    private $userService;
    private $questionService;
    private $validatorService;
    public function __construct(UserService $userServices, QuestionService $questionService, ValidatorService $validatorService)
    {
        $this->userService = $userServices;
        $this->questionService = $questionService;
        $this->validatorService = $validatorService;
    }
    public function index()
    {
        $user = Auth::user();
        return view('index.index', ['user' => $user]);
    }

    public function enter(Request $request)
    {
        $validator = $this->validatorService->serviceValid($request);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }

        $this->userService->userCreate($request);
        $user = User::where('name', $request->input('name'))->first();
        Auth::login($user);
        return back()->withInput();
    }

    public function question(Request $request)
    {
        $answersArr = Config::get('answersArr');
        $rand_key = array_rand($answersArr);
        $rand_answer = $answersArr[$rand_key];
        $this->questionService->questionCreate($request, $rand_answer);
        $info = $this->questionService->infoQuestion($request);
        return to_route('index', ['question' => $request->question, 'rand_answer' => $rand_answer, 'infoQuestionTotal'=> $info['infoQuestionTotal'], 'infoQuestionUser'=> $info['infoQuestionUser']]);
    }
}
