@extends('_layouts.main')

@section('body')
    <div class="flex flex-col items-center text-gray-700 mt-32 mb-10">
        <h1 class="text-6xl font-light leading-none mb-2">Ripetizioni</h1>

        {{--        <h2 class="text-3xl">Informatica, Sistemi, Inglese, Programazione.</h2>--}}
        <h2 class="text-3xl text-center">Lead Software Developer impartisce lezioni di Informatica teorica,
            Programmazione (Java / C / Javascript /
            PHP) e Inglese.</h2>

        <hr class="block w-full max-w-sm mx-auto border my-8">

        <p class="text-xl text-center">
            Mi chiamo Sofia, sviluppo software dalla tenera età di 13 anni. Sono una persona esperta nel mondo dello
            sviluppo,
            vivendo sia in Italia che in Scozia, apprezzata da diverse aziende globali per cui ho lavorato
            (Sky, Kaleyra, NCTech, ContactLab e altre). Impartisco lezioni di Inglese, Programmazione e Informatica
            teorica
            a studenti delle Superiori, che sia ITIS o Scientifico, con me sarete sempre avanti col programma!
        </p>
        <p class="text-xl text-center">
            Uso un metodo di insegnamento pratico, quindi avrai bisogno di un computer configurato per poter eseguire
            gli esercizi -
            nelle prime lezioni posso aiutarti a configurarlo.
        </p>
        <p class="text-xl text-center">
            Zone Aprilia - Anzio - Nettuno oppure Online - €20 ad ora, con fattura e pagamenti digitali.
        </p>
        <div class="text-xl flex justify-around w-full">
            <div><a href="//go.italianprogrammer.pizza/curriculum" class="btn btn-blue">Curriculum</a></div>
            <div><a href="#contatti" class="btn btn-blue">Contattami</a></div>
        </div>
    </div>

    <div class="mt-6 flex flex-col items-center justify-center">
        <div data-tf-widget="hDb5wFYC" data-tf-iframe-props="title=Contatti - Ripetizioni" data-tf-medium="snippet"
             style="width:100%;height:60vh;"></div>
        <script src="//embed.typeform.com/next/embed.js"></script>
        <a id="contatti"></a>
    </div>
@endsection
