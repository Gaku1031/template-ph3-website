<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITクイズ | POSSE 初めてのWeb制作</title>
<!-- スタイルシート読み込み -->
    <link rel="stylesheet" href="{{ asset('/css/common.css') }}">
<!-- Google Fonts読み込み -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;700&family=Plus+Jakarta+Sans:wght@400;700&display=swap"
    rel="stylesheet">
<script src="{{ asset('/js/common.js') }}" defer></script>
<script src="{{ asset('/js/quiz.js') }}" defer></script>
</head>

<body>
    @include('parts.header')
    <main class="l-main">
        <section class="p-hero p-quiz-hero">
            <div class="l-container">
            <h1 class="p-hero__title">
                <span class="p-hero__title__label">POSSE課題</span>
                <span class="p-hero__title__inline">ITクイズ</span>
            </h1>
            </div>
        </section>
        <!-- /.p-hero .p-quiz-hero -->
        <div class="p-quiz-container l-container">
            @foreach($quiz->questions as $i => $question)
                <section class="p-quiz-box js-quiz" data-quiz="{{$i}}">
                    <div class="p-quiz-box__question">
                        <h2 class="p-quiz-box__question__title">
                            <span class="p-quiz-box__label">Q{{$i+1}}</span>
                            <span class="p-quiz-box__question__title__text"> {{ $question->text }} </span>
                        </h2>
                        <figure class="p-quiz-box__question__image">
                        <img src="{{ asset($question->image) }}" alt="">
                        </figure>
                    </div>
                    <div class="p-quiz-box__answer">
                        <span class="p-quiz-box__label p-quiz-box__label--accent">A</span>
                        <ul class="p-quiz-box__answer__list">
                            @foreach ($question->choices as $choice)
                                <li class="p-quiz-box__answer__item">
                                    <button class="p-quiz-box__answer__button js-answer" data-correct="{{$choice->is_correct}}">
                                        {{$choice->text}}<i class="u-icon__arrow"></i>
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                        <div class="p-quiz-box__answer__correct js-answerBox">
                            <p class="p-quiz-box__answer__correct__title js-answerTitle"></p>
                            <p class="p-quiz-box__answer__correct__content">
                                <span class="p-quiz-box__answer__correct__content__label">A</span>
                                <span class="js-answerText"></span>
                            </p>
                        </div>
                    </div>
                    @if($question->supplement)
                        <cite class="p-quiz-box__note">
                            <i class="u-icon__note"></i>{{$question->supplement}}
                        </cite>
                    @endif
                </section>
            @endforeach
        </div>               
    <!-- /.l-container .p-quiz-container -->
</main>

<div class="p-line">
    <div class="l-container">
        <div class="p-line__body">
        <div class="p-line__body__inner">
          <h2 class="p-heading -light p-line__title"><i class="u-icon__line"></i>POSSE 公式LINE</h2>
          <div class="p-line__content">
            <p>公式LINEにてご質問を随時受け付けております。<br>詳細やPOSSE最新情報につきましては、公式LINEにてお知らせ致しますので<br>下記ボタンより友達追加をお願いします！</p>
          </div>
          <div class="p-line__footer">
            <a href="https://line.me/R/ti/p/@651htnqp?from=page" target="_blank" rel="noopener noreferrer"
              class="p-line__button">LINE追加<i class="u-icon__link"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  @include('parts.footer')
</body>
