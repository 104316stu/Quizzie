<?php
function get_questions() {
    $questions = [
        [
            'question'     => 'Waar staat ADHD?',
            'openQuestion' => false,
            'answers'      => [
                'Attention deficit hyperactivity disorder',
                'Advanced hyperactive development disorder',
                'Attention deficit high disorder',
                'Advanced hippo development disorder',
            ],
            'correct'      => 0, // dit is om te zien welke antwoordt correct is
        ],
        [
            'question'     => 'Welke kenmerken komen vaak voor bij ADHD?',
            'openQuestion' => false,
            'answers'      => [
                'Hoesten',
                'Random Onbewust bewegingen',
                'Moeite met opletten',
                'Dansen',
            ],
            'correct'      => 2,
        ],

        [
            'question'     => 'Wanneer wordt ADHD meestal vastgesteld?',
            'openQuestion' => false,
            'answers'      => [
                'Babytijd',
                'Rond 12 jaar',
                'Ouderdom',
                'Allen als je volwassen bent',
            ],
            'correct'      => 2,
        ],

        [
            'question'     => 'Wat is een officiële types ADHD?',
            'openQuestion' => false,
            'answers'      => [
                'Emotioneel type',
                'Onoplettend type',
                'Creatif type',
                'Sociaal type',
            ],
            'correct'      => 1,
        ],

        [
            'question'     => 'ADHD kan doorgaan tot in - ?',
            'openQuestion' => false,
            'answers'      => [
                'tot alleen in de kindertijd',
                'tot hoge leeftijd',
                'tot in de volwassenheid',
            ],
            'correct'      => 2,
        ],

        [
            'question'     => 'Hoe kan ADHD verschillen tussen mensen?',
            'openQuestion' => false,
            'answers'      => [
                'Het verschilt per leeftijdsgroep',
                'Het hangt alleen af van intelligentie',
                'Het ziet er bij iedereen hetzelfde uit',
            ],
            'correct'      => 0,
        ],

        [
            'question'     => 'Wat is een mogelijk oorzaak van ADHD zijn?',
            'openQuestion' => false,
            'answers'      => [
                'Als er tijdens de zwangerschap paracetamol is ingenomen',
                'Vershil in slaap routine',
                'Veshil in hersenontwikkeling',
                'Vershil in hersenen grote',
            ],
            'correct'      => 2,
        ],


        [
            'question'     => 'Wat klopt over erfelijkheid en ADHD?',
            'openQuestion' => false,
            'answers'      => [
                'Het heeft niets met genen te maken',
                'Het wordt door een bepaalde gen veroorzaakt',
                'Het gebeurt wanner er een genmutatie optreedt',
                'Meerdere genen kunnen een rol spelen ',
            ],
            'correct'      => 3,
        ],

        [
            'question'     => 'Wat kan het risico op ADHD verhogen',
            'openQuestion' => false,
            'answers'      => [
                'Niet genoeg slapen',
                'Veel stress thuis',
                'Iemand met ADHD zoenen',
                'Als je innademt',

            ],
            'correct'      => 1,
        ],

        [
            'question'     => 'Leg in eigen woorden uit wat ADHD is.',
            'openQuestion' => true,
            'minimumKeywords' => 3,
            'keywords'     => [
                'Hyperactive','snel afgeleid','Dagdromen','fel','textuur','aanraking','geur',
                'drukte','menigte','temperatuur',
            ],
            'exampleAnswer' => 'Bij ADHD heb ben je vaak druk en snel afgeleid',
        ],


        [
            'question'     => 'Noem drie types ADHD en leg ze kort uit',
            'openQuestion' => true,
            'minimumKeywords' => 3,
            'keywords'     => [
                'onoplettend','inattentive','hyperactief','gecombineerd','combined','hyperactive','combinatie van beide',
                'snel afgeleid', 'druk zijn'
            ],
            'exampleAnswer' => '
            Combined:  een combinatie van de twee.
            Onplettend: stel afgeleid zijn.
            Hyperactief: druk zijn.
            ',
        ],

        [
            'question'     => 'Wat betekent "impulsief gedrag bij ADHD ',
            'openQuestion' => false,
            'answers'      => [
                'Nooit fouten maken',
                'Iets op een druke manier doen ',
                'Iets doen zonder er over na te denken',
                'Elke dag wat fouten maken',
            ],
            'correct'      => 2,
        ],

        [
            'question'     => 'Hoe kan ADHD invloed hebben op het dagelijk leven?',
            'openQuestion' => true,
            'minimumKeywords' => 3,
            'keywords'     => [
                'concentreren','stilzitten','samenwerken','moeite hebben met opdrachten afmaken',

            ],
            'exampleAnswer' => 'Moeite hebben met opdrachten',
        ],


        [
            'question'     => 'Wat was de oude naam van inattentive type van ADHD',
            'openQuestion' => true,
            'minimumKeywords' => 1,
            'keywords'     => [
                'ADD','Attention Deficit Disorder',

            ],
            'exampleAnswer' => 'ADD',
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