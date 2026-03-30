<?php
function get_questions()
{
    $questions = [
        [
            'question'     => 'Waar staat ASS voor?',
            'openQuestion' => false,
            'answers'      => [
                'Autisme Spectrum Stoornis',
                'Aandacht Spectrum Stoornis',
                'Algemene Sociale Stoornis',
            ],
            'correct'      => 0,
        ],
        [
            'question'     => 'Hoe wordt autisme het best omschreven?',
            'openQuestion' => false,
            'answers'      => [
                'Een neurobiologische ontwikkelingsstoornis die iemand zijn hele leven heeft',
                'Een tijdelijke ziekte die met therapie volledig geneest',
                'Een opvoedingsprobleem dat door ouders wordt veroorzaakt',
            ],
            'correct'      => 0,
        ],
        [
            'question'     => 'Waarom heet het autisme "spectrum"?',
            'openQuestion' => false,
            'answers'      => [
                'Omdat de kenmerken en ondersteuningsbehoeften per persoon sterk kunnen verschillen',
                'Omdat de symptomen elk uur van kleur wisselen',
                'Omdat het alleen voorkomt bij bepaalde groepen mensen',
            ],
            'correct'      => 0,
        ],
        [
            'question'     => 'Hoe ervaren sommige autistische mensen sociale communicatie?',
            'openQuestion' => false,
            'answers'      => [
                'Ze communiceren op een andere manier, bijvoorbeeld met voorkeur voor directe taal',
                'Ze kunnen nooit communiceren met anderen',
                'Ze begrijpen sarcastische en indirecte taal altijd moeiteloos',
            ],
            'correct'      => 0,
        ],
        [
            'question'     => 'Welke zintuiglijke prikkels kunnen moeilijk zijn voor autistische mensen?',
            'openQuestion' => false,
            'answers'      => [
                'Felle lichten, harde geluiden of bepaalde texturen',
                'Alleen extreme kou',
                'Alleen honger',
            ],
            'correct'      => 0,
        ],
        [
            'question'     => 'Waarom kunnen vaste routines belangrijk zijn voor autistische mensen?',
            'openQuestion' => false,
            'answers'      => [
                'Ze verminderen onzekerheid, wat angst en stress kan verlagen',
                'Ze zijn wettelijk verplicht voor autistische personen',
                'Ze verwijderen alle emoties en maken het leven makkelijker',
            ],
            'correct'      => 0,
        ],
        [
            'question'     => 'Een collega raakt van streek door het lawaai op kantoor. Wat is de meest ondersteunende reactie?',
            'openQuestion' => false,
            'answers'      => [
                'Bied een rustigere ruimte of gehoorbeschermende opties aan',
                'Zeg dat ze zich beter moeten concentreren en het geluid moeten negeren',
                'Zet achtergrondmuziek harder zodat ze er sneller aan wennen',
            ],
            'correct'      => 0,
        ],
        [
            'question'     => 'Welke cognitieve kracht wordt bij sommige autistische mensen gezien?',
            'openQuestion' => false,
            'answers'      => [
                'Sterke focus, patroonherkenning en diepe kennis over interessegebieden',
                'Het onvermogen om nieuwe dingen te leren',
                'Geen geheugen voor details',
            ],
            'correct'      => 0,
        ],
        [
            'question'     => 'Op welke leeftijd verdwijnt autisme?',
            'openQuestion' => false,
            'answers'      => [
                'Autisme verdwijnt niet — het is een levenslange conditie',
                'Autisme verdwijnt meestal rond de leeftijd van 18 jaar',
                'Autisme verdwijnt zodra iemand gaat werken',
            ],
            'correct'      => 0,
        ],
        [
            'question'     => 'Welke aanpak past bij respectvolle communicatie met een autistisch persoon?',
            'openQuestion' => false,
            'answers'      => [
                'Gebruik duidelijke, directe taal en vraag naar communicatievoorkeuren',
                'Ga ervan uit dat ze hints en onuitgesproken verwachtingen vanzelf begrijpen',
                'Spreek namens hen zonder eerst hun mening te vragen',
            ],
            'correct'      => 0,
        ],
        [
            'question'     => 'Noem drie zintuiglijke prikkels die moeilijk kunnen zijn voor sommige autistische mensen.',
            'openQuestion' => true,
            'minimumKeywords' => 3,
            'keywords'     => [
                'lawaai','geluid','licht','fel','textuur','aanraking','geur',
                'drukte','menigte','temperatuur',
            ],
           'exampleAnswer' => 'Hard geluid, felle lichten en onprettige kledingsstof.',
        ],
        [
            'question'     => 'Geef twee voorbeelden van nuttige ondersteuning op school of werk voor een autistisch persoon.',
            'openQuestion' => true,
            'minimumKeywords' => 2,
            'keywords'     => [
                'duidelijke instructies','duidelijk','routine','schema','rustige ruimte','pauze',
                'extra tijd','visueel','schriftelijk','koptelefoon',
            ],
           'exampleAnswer' => 'Duidelijke schriftelijke instructies en een rustige plek om korte pauzes te nemen.',
        ],
        [
            'question'     => 'Leg uit waarom voorspelbare routines belangrijk kunnen zijn voor sommige autistische mensen.',
            'openQuestion' => true,
            'minimumKeywords' => 2,
            'keywords'     => [
                'voorspelbaar','voorspelbaarheid','stress','angst','rustig','structuur',
                'veilig','zekerheid','verandering','overgang',
            ],
           'exampleAnswer' => 'Routines maken de dag voorspelbaar, wat stress en angst kan verminderen.',
        ],
        [
            'question'     => 'Geef twee respectvolle communicatietips voor een gesprek met een autistisch persoon.',
            'openQuestion' => true,
            'minimumKeywords' => 2,
            'keywords'     => [
                'duidelijk','direct','geduld','luisteren','voorkeur','letterlijk',
                'eenvoudig','vragen','tijd','respect',
            ],
           'exampleAnswer' => 'Gebruik duidelijke taal en vraag naar hun communicatievoorkeuren.',
        ],
        [
            'question'     => 'Noem twee sterke kanten die een autistisch persoon kan hebben.',
            'openQuestion' => true,
            'minimumKeywords' => 2,
            'keywords'     => [
                'focus','detail','geheugen','eerlijkheid','creativiteit','patroon',
                'analyse','kennis','probleemoplossing','toewijding',
            ],
           'exampleAnswer' => 'Sterke aandacht voor detail en diepgaande kennis over speciale interesses.',
        ],
    ];

    foreach ($questions as &$q) {
        if (!$q['openQuestion']) {
            $correct_answer = $q['answers'][$q['correct']];
            shuffle($q['answers']);
            $q['correct'] = array_search($correct_answer, $q['answers']);
        }
    }
    unset($q);

    return $questions;
}