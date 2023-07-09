@extends('layouts.baseIndex')

@section('content')
    <div class="containerMain ">
        <div class="panel">
            <div class="title">
                <div>
                    ШАР ПРЕДСКАЗАНИЙ
                </div>
            </div>
            <div class='menu'>
                @if (!isset($user))
                    <form method="POST" action="{{ route('enter') }}" accept-charset="utf-8">
                        @csrf
                        <label class="conf-step__label" for="mail">
                            <h4>{{ __('Введите имя пользователя') }}</h4>
                            <input id="name" class="conf-step__input @error('name') is-invalid @enderror"
                                name="name">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </label>
                        <div class="conf-step__buttons">
                            <input type="submit" value="Войти"
                                class="conf-step__button-accent
                       conf-step__button"
                                data-bs-dismiss="modal">

                        </div>
                    </form>
                @else
                    <div class="conf-step__label ">
                        <h4 class="active_client">{{ $user->name }}<h4>
                                <div>
                                    <a class="exit" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                                        {{ __('Сменить пользователя') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                    </form>
                                </div>
                    </div>
                    <form method="POST" action="{{ route('question') }}" accept-charset="utf-8">
                        @csrf
                        <label class="conf-step__label  for="question">
                            <p>Задайте вопрос шару</p>
                            <input class="conf-step__input" type="text" name="question" id="question"
                                onkeyup="Utils.toggleButton()">
                            <div class='hintQuestion disabled' id='hintQuestion'>Обязательно в конце вопроса поставить знак
                                "?"</div>
                        </label>
                        <div class="conf-step__buttons disabled" id="submitButton">
                            <input type="submit" value='Получить ответ'
                                class="conf-step__button-accent
                                   conf-step__button">
                        </div>
                    </form>
                @endif
            </div>
        </div>
        <div class="header-ball">
        <div class="ball-question">{{ request()->get('question') }}</div>
        <div class= 'info'>
            <div class='infoQuestion'>{{request()->get('infoQuestionTotal')}}</div>
            <div class='infoQuestion'>{{request()->get('infoQuestionUser')}}</div>
           </div>
        </div>
        <div class="ball">
            <div class="ball-answer">
                {{ request()->get('rand_answer') }}
            </div>
            <div>
                <img class="ball-picture" src="index\i\banner.png" />
            </div>
        </div>
    </div>
@endsection()
