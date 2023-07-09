<?php

namespace App\Services;

use App\Models\Question;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;

/**
 * Summary of TransferService
 */
class QuestionService
{
    public $data;

    /**
     * Summary of transferCreate
     * @param mixed $sum_client
     * @param mixed $name_client
     * @param mixed $date_transfer
     * @return array
     */
    public function questionCreate($request, $rand_answer): void
    {
        $user = Auth::user();

        $this->data = [
            'user_id' => $user->id,
            'description' => $request->question,
            'answer' => $rand_answer,
        ];

        Question::class::create($this->data);
    }

    /**
     * Summary of infoQuestion
     */
    public function infoQuestion($request): array
    {
        $user = Auth::user();

        $countTotal = Question::where('description', $request->question)->count();
        $countUser = Question::where('description', $request->question)->where('user_id', $user->id)->count();
        $infoQuestionTotal = "Всего этот вопрос задавался шару $countTotal раз" ;
        $infoQuestionUser = "Данный пользователь задавал этот вопрос $countUser раз";
        $array = array("infoQuestionTotal" => $infoQuestionTotal, "infoQuestionUser" => $infoQuestionUser);
        return $array;
    }

}
