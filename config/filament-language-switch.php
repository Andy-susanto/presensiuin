<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Language display name
    |--------------------------------------------------------------------------
    |
    | Option to whether display the language in English or Native.
    |
    */

    'native' => true,

    /*
    |--------------------------------------------------------------------------
    | Flag
    |--------------------------------------------------------------------------
    |
    | Option to display flag for the Language.
    | By default the first and second letter of the display name (if single word, otherwise first letter of first two words) will be used instead of flag.
    | If set to true, the following package needs to be installed via composer.
    | "composer require stijnvanouplines/blade-country-flags"
    */

    'flag' => false,

    /*
    |--------------------------------------------------------------------------
    | All Locales (Languages)
    |--------------------------------------------------------------------------
    |
    | Uncomment the languages that your site supports - or add new ones.
    | These are sorted by the native name, which is the order you might show them in a language selector.
    |
    */

    'locales' => [
        'ar' => ['name' => 'Arabic',                 'script' => 'Arab', 'native' => 'العربية', 'flag_code' => 'sa'],
        'en' => ['name' => 'English',                'script' => 'Latn', 'native' => 'English', 'flag_code' => 'us'],
        // 'fr' => ['name' => 'French',                 'script' => 'Latn', 'native' => 'français', 'flag_code' => 'fr'],

        // 'ace' => ['name' => 'Achinese',               'script' => 'Latn', 'native' => 'Aceh', 'flag_code' => ''],
        //'af'          => ['name' => 'Afrikaans',              'script' => 'Latn', 'native' => 'Afrikaans', 'flag_code' => '' ],
        //'agq'         => ['name' => 'Aghem',                  'script' => 'Latn', 'native' => 'Aghem', 'flag_code' => '' ],
        //'ak'          => ['name' => 'Akan',                   'script' => 'Latn', 'native' => 'Akan', 'flag_code' => '' ],
        //'an'          => ['name' => 'Aragonese',              'script' => 'Latn', 'native' => 'aragonés', 'flag_code' => '' ],
        //'cch'         => ['name' => 'Atsam',                  'script' => 'Latn', 'native' => 'Atsam', 'flag_code' => '' ],
        //'gn'          => ['name' => 'Guaraní',                'script' => 'Latn', 'native' => 'Avañe’ẽ', 'flag_code' => '' ],
        //'ae'          => ['name' => 'Avestan',                'script' => 'Latn', 'native' => 'avesta', 'flag_code' => '' ],
        //'ay'          => ['name' => 'Aymara',                 'script' => 'Latn', 'native' => 'aymar aru', 'flag_code' => '' ],
        //'az'          => ['name' => 'Azerbaijani (Latin)',    'script' => 'Latn', 'native' => 'azərbaycanca', 'flag_code' => '' ],
        'id'          => ['name' => 'Indonesian',             'script' => 'Latn', 'native' => 'Bahasa Indonesia', 'flag_code' => 'id' ],
        //'ms'          => ['name' => 'Malay',                  'script' => 'Latn', 'native' => 'Bahasa Melayu', 'flag_code' => '' ],
        //'bm'          => ['name' => 'Bambara',                'script' => 'Latn', 'native' => 'bamanakan', 'flag_code' => '' ],
        //'jv'          => ['name' => 'Javanese (Latin)',       'script' => 'Latn', 'native' => 'Basa Jawa', 'flag_code' => '' ],
        //'su'          => ['name' => 'Sundanese',              'script' => 'Latn', 'native' => 'Basa Sunda', 'flag_code' => '' ],
        //'bh'          => ['name' => 'Bihari',                 'script' => 'Latn', 'native' => 'Bihari', 'flag_code' => '' ],
        //'bi'          => ['name' => 'Bislama',                'script' => 'Latn', 'native' => 'Bislama', 'flag_code' => '' ],
        //'nb'          => ['name' => 'Norwegian Bokmål',       'script' => 'Latn', 'native' => 'Bokmål', 'flag_code' => '' ],
        //'bs'          => ['name' => 'Bosnian',                'script' => 'Latn', 'native' => 'bosanski', 'flag_code' => '' ],
        //'br'          => ['name' => 'Breton',                 'script' => 'Latn', 'native' => 'brezhoneg', 'flag_code' => '' ],
        //'ca'          => ['name' => 'Catalan',                'script' => 'Latn', 'native' => 'català', 'flag_code' => '' ],
        //'ch'          => ['name' => 'Chamorro',               'script' => 'Latn', 'native' => 'Chamoru', 'flag_code' => '' ],
        //'ny'          => ['name' => 'Chewa',                  'script' => 'Latn', 'native' => 'chiCheŵa', 'flag_code' => '' ],
        //'kde'         => ['name' => 'Makonde',                'script' => 'Latn', 'native' => 'Chimakonde', 'flag_code' => '' ],
        //'sn'          => ['name' => 'Shona',                  'script' => 'Latn', 'native' => 'chiShona', 'flag_code' => '' ],
        //'co'          => ['name' => 'Corsican',               'script' => 'Latn', 'native' => 'corsu', 'flag_code' => '' ],
        //'cy'          => ['name' => 'Welsh',                  'script' => 'Latn', 'native' => 'Cymraeg', 'flag_code' => '' ],
        //'da'          => ['name' => 'Danish',                 'script' => 'Latn', 'native' => 'dansk', 'flag_code' => '' ],
        //'se'          => ['name' => 'Northern Sami',          'script' => 'Latn', 'native' => 'davvisámegiella', 'flag_code' => '' ],
        //'de'          => ['name' => 'German',                 'script' => 'Latn', 'native' => 'Deutsch', 'flag_code' => 'de' ],
        //'luo'         => ['name' => 'Luo',                    'script' => 'Latn', 'native' => 'Dholuo', 'flag_code' => '' ],
        //'nv'          => ['name' => 'Navajo',                 'script' => 'Latn', 'native' => 'Diné bizaad', 'flag_code' => '' ],
        //'dua'         => ['name' => 'Duala',                  'script' => 'Latn', 'native' => 'duálá', 'flag_code' => '' ],
        //'et'          => ['name' => 'Estonian',               'script' => 'Latn', 'native' => 'eesti', 'flag_code' => '' ],
        //'na'          => ['name' => 'Nauru',                  'script' => 'Latn', 'native' => 'Ekakairũ Naoero', 'flag_code' => '' ],
        //'guz'         => ['name' => 'Ekegusii',               'script' => 'Latn', 'native' => 'Ekegusii', 'flag_code' => '' ],
        //'en-AU'       => ['name' => 'Australian English',     'script' => 'Latn', 'native' => 'Australian English', 'flag_code' => '' ],
        // 'en-GB'       => ['name' => 'British English',        'script' => 'Latn', 'native' => 'British English', 'flag_code' => 'gb' ],
        //'en-CA'       => ['name' => 'Canadian English',       'script' => 'Latn', 'native' => 'Canadian English', 'flag_code' => '' ],
        //'en-US'       => ['name' => 'U.S. English',           'script' => 'Latn', 'native' => 'U.S. English', 'flag_code' => '' ],
        // 'es'          => ['name' => 'Spanish',                'script' => 'Latn', 'native' => 'español', 'flag_code' => '' ],
        //'eo'          => ['name' => 'Esperanto',              'script' => 'Latn', 'native' => 'esperanto', 'flag_code' => '' ],
        //'eu'          => ['name' => 'Basque',                 'script' => 'Latn', 'native' => 'euskara', 'flag_code' => '' ],
        //'ewo'         => ['name' => 'Ewondo',                 'script' => 'Latn', 'native' => 'ewondo', 'flag_code' => '' ],
        //'ee'          => ['name' => 'Ewe',                    'script' => 'Latn', 'native' => 'eʋegbe', 'flag_code' => '' ],
        //'fil'         => ['name' => 'Filipino',               'script' => 'Latn', 'native' => 'Filipino', 'flag_code' => '' ],
        //'fr'          => ['name' => 'French',                 'script' => 'Latn', 'native' => 'français', 'flag_code' => '' ],
        //'fr-CA'       => ['name' => 'Canadian French',        'script' => 'Latn', 'native' => 'français canadien', 'flag_code' => '' ],
        //'fy'          => ['name' => 'Western Frisian',        'script' => 'Latn', 'native' => 'frysk', 'flag_code' => '' ],
        //'fur'         => ['name' => 'Friulian',               'script' => 'Latn', 'native' => 'furlan', 'flag_code' => '' ],
        //'fo'          => ['name' => 'Faroese',                'script' => 'Latn', 'native' => 'føroyskt', 'flag_code' => '' ],
        //'gaa'         => ['name' => 'Ga',                     'script' => 'Latn', 'native' => 'Ga', 'flag_code' => '' ],
        //'ga'          => ['name' => 'Irish',                  'script' => 'Latn', 'native' => 'Gaeilge', 'flag_code' => '' ],
        //'gv'          => ['name' => 'Manx',                   'script' => 'Latn', 'native' => 'Gaelg', 'flag_code' => '' ],
        //'sm'          => ['name' => 'Samoan',                 'script' => 'Latn', 'native' => 'Gagana fa’a Sāmoa', 'flag_code' => '' ],
        //'gl'          => ['name' => 'Galician',               'script' => 'Latn', 'native' => 'galego', 'flag_code' => '' ],
        //'ki'          => ['name' => 'Kikuyu',                 'script' => 'Latn', 'native' => 'Gikuyu', 'flag_code' => '' ],
        //'gd'          => ['name' => 'Scottish Gaelic',        'script' => 'Latn', 'native' => 'Gàidhlig', 'flag_code' => '' ],
        //'ha'          => ['name' => 'Hausa',                  'script' => 'Latn', 'native' => 'Hausa', 'flag_code' => '' ],
        //'bez'         => ['name' => 'Bena',                   'script' => 'Latn', 'native' => 'Hibena', 'flag_code' => '' ],
        //'ho'          => ['name' => 'Hiri Motu',              'script' => 'Latn', 'native' => 'Hiri Motu', 'flag_code' => '' ],
        //'hr'          => ['name' => 'Croatian',               'script' => 'Latn', 'native' => 'hrvatski', 'flag_code' => '' ],
        //'bem'         => ['name' => 'Bemba',                  'script' => 'Latn', 'native' => 'Ichibemba', 'flag_code' => '' ],
        //'io'          => ['name' => 'Ido',                    'script' => 'Latn', 'native' => 'Ido', 'flag_code' => '' ],
        //'ig'          => ['name' => 'Igbo',                   'script' => 'Latn', 'native' => 'Igbo', 'flag_code' => '' ],
        //'rn'          => ['name' => 'Rundi',                  'script' => 'Latn', 'native' => 'Ikirundi', 'flag_code' => '' ],
        //'ia'          => ['name' => 'Interlingua',            'script' => 'Latn', 'native' => 'interlingua', 'flag_code' => '' ],
        //'iu-Latn'     => ['name' => 'Inuktitut (Latin)',      'script' => 'Latn', 'native' => 'Inuktitut', 'flag_code' => '' ],
        //'sbp'         => ['name' => 'Sileibi',                'script' => 'Latn', 'native' => 'Ishisangu', 'flag_code' => '' ],
        //'nd'          => ['name' => 'North Ndebele',          'script' => 'Latn', 'native' => 'isiNdebele', 'flag_code' => '' ],
        //'nr'          => ['name' => 'South Ndebele',          'script' => 'Latn', 'native' => 'isiNdebele', 'flag_code' => '' ],
        //'xh'          => ['name' => 'Xhosa',                  'script' => 'Latn', 'native' => 'isiXhosa', 'flag_code' => '' ],
        //'zu'          => ['name' => 'Zulu',                   'script' => 'Latn', 'native' => 'isiZulu', 'flag_code' => '' ],
        //'it'          => ['name' => 'Italian',                'script' => 'Latn', 'native' => 'italiano', 'flag_code' => '' ],
        //'ik'          => ['name' => 'Inupiaq',                'script' => 'Latn', 'native' => 'Iñupiaq', 'flag_code' => '' ],
        //'dyo'         => ['name' => 'Jola-Fonyi',             'script' => 'Latn', 'native' => 'joola', 'flag_code' => '' ],
        //'kea'         => ['name' => 'Kabuverdianu',           'script' => 'Latn', 'native' => 'kabuverdianu', 'flag_code' => '' ],
        //'kaj'         => ['name' => 'Jju',                    'script' => 'Latn', 'native' => 'Kaje', 'flag_code' => '' ],
        //'mh'          => ['name' => 'Marshallese',            'script' => 'Latn', 'native' => 'Kajin M̧ajeļ', 'flag_code' => '' ],
        //'kl'          => ['name' => 'Kalaallisut',            'script' => 'Latn', 'native' => 'kalaallisut', 'flag_code' => '' ],
        //'kln'         => ['name' => 'Kalenjin',               'script' => 'Latn', 'native' => 'Kalenjin', 'flag_code' => '' ],
        //'kr'          => ['name' => 'Kanuri',                 'script' => 'Latn', 'native' => 'Kanuri', 'flag_code' => '' ],
        //'kcg'         => ['name' => 'Tyap',                   'script' => 'Latn', 'native' => 'Katab', 'flag_code' => '' ],
        //'kw'          => ['name' => 'Cornish',                'script' => 'Latn', 'native' => 'kernewek', 'flag_code' => '' ],
        //'naq'         => ['name' => 'Nama',                   'script' => 'Latn', 'native' => 'Khoekhoegowab', 'flag_code' => '' ],
        //'rof'         => ['name' => 'Rombo',                  'script' => 'Latn', 'native' => 'Kihorombo', 'flag_code' => '' ],
        //'kam'         => ['name' => 'Kamba',                  'script' => 'Latn', 'native' => 'Kikamba', 'flag_code' => '' ],
        //'kg'          => ['name' => 'Kongo',                  'script' => 'Latn', 'native' => 'Kikongo', 'flag_code' => '' ],
        //'jmc'         => ['name' => 'Machame',                'script' => 'Latn', 'native' => 'Kimachame', 'flag_code' => '' ],
        //'rw'          => ['name' => 'Kinyarwanda',            'script' => 'Latn', 'native' => 'Kinyarwanda', 'flag_code' => '' ],
        //'asa'         => ['name' => 'Kipare',                 'script' => 'Latn', 'native' => 'Kipare', 'flag_code' => '' ],
        //'rwk'         => ['name' => 'Rwa',                    'script' => 'Latn', 'native' => 'Kiruwa', 'flag_code' => '' ],
        //'saq'         => ['name' => 'Samburu',                'script' => 'Latn', 'native' => 'Kisampur', 'flag_code' => '' ],
        //'ksb'         => ['name' => 'Shambala',               'script' => 'Latn', 'native' => 'Kishambaa', 'flag_code' => '' ],
        //'swc'         => ['name' => 'Congo Swahili',          'script' => 'Latn', 'native' => 'Kiswahili ya Kongo', 'flag_code' => '' ],
        //'sw'          => ['name' => 'Swahili',                'script' => 'Latn', 'native' => 'Kiswahili', 'flag_code' => '' ],
        //'dav'         => ['name' => 'Dawida',                 'script' => 'Latn', 'native' => 'Kitaita', 'flag_code' => '' ],
        //'teo'         => ['name' => 'Teso',                   'script' => 'Latn', 'native' => 'Kiteso', 'flag_code' => '' ],
        //'khq'         => ['name' => 'Koyra Chiini',           'script' => 'Latn', 'native' => 'Koyra ciini', 'flag_code' => '' ],
        //'ses'         => ['name' => 'Songhay',                'script' => 'Latn', 'native' => 'Koyraboro senni', 'flag_code' => '' ],
        //'mfe'         => ['name' => 'Morisyen',               'script' => 'Latn', 'native' => 'kreol morisien', 'flag_code' => '' ],
        //'ht'          => ['name' => 'Haitian',                'script' => 'Latn', 'native' => 'Kreyòl ayisyen', 'flag_code' => '' ],
        //'kj'          => ['name' => 'Kuanyama',               'script' => 'Latn', 'native' => 'Kwanyama', 'flag_code' => '' ],
        //'ksh'         => ['name' => 'Kölsch',                 'script' => 'Latn', 'native' => 'Kölsch', 'flag_code' => '' ],
        //'ebu'         => ['name' => 'Kiembu',                 'script' => 'Latn', 'native' => 'Kĩembu', 'flag_code' => '' ],
        //'mer'         => ['name' => 'Kimîîru',                'script' => 'Latn', 'native' => 'Kĩmĩrũ', 'flag_code' => '' ],
        //'lag'         => ['name' => 'Langi',                  'script' => 'Latn', 'native' => 'Kɨlaangi', 'flag_code' => '' ],
        //'lah'         => ['name' => 'Lahnda',                 'script' => 'Latn', 'native' => 'Lahnda', 'flag_code' => '' ],
        //'la'          => ['name' => 'Latin',                  'script' => 'Latn', 'native' => 'latine', 'flag_code' => '' ],
        //'lv'          => ['name' => 'Latvian',                'script' => 'Latn', 'native' => 'latviešu', 'flag_code' => '' ],
        //'to'          => ['name' => 'Tongan',                 'script' => 'Latn', 'native' => 'lea fakatonga', 'flag_code' => '' ],
        //'lt'          => ['name' => 'Lithuanian',             'script' => 'Latn', 'native' => 'lietuvių', 'flag_code' => '' ],
        //'li'          => ['name' => 'Limburgish',             'script' => 'Latn', 'native' => 'Limburgs', 'flag_code' => '' ],
        //'ln'          => ['name' => 'Lingala',                'script' => 'Latn', 'native' => 'lingála', 'flag_code' => '' ],
        //'lg'          => ['name' => 'Ganda',                  'script' => 'Latn', 'native' => 'Luganda', 'flag_code' => '' ],
        //'luy'         => ['name' => 'Oluluyia',               'script' => 'Latn', 'native' => 'Luluhia', 'flag_code' => '' ],
        //'lb'          => ['name' => 'Luxembourgish',          'script' => 'Latn', 'native' => 'Lëtzebuergesch', 'flag_code' => '' ],
        //'hu'          => ['name' => 'Hungarian',              'script' => 'Latn', 'native' => 'magyar', 'flag_code' => '' ],
        //'mgh'         => ['name' => 'Makhuwa-Meetto',         'script' => 'Latn', 'native' => 'Makua', 'flag_code' => '' ],
        //'mg'          => ['name' => 'Malagasy',               'script' => 'Latn', 'native' => 'Malagasy', 'flag_code' => '' ],
        //'mt'          => ['name' => 'Maltese',                'script' => 'Latn', 'native' => 'Malti', 'flag_code' => '' ],
        //'mtr'         => ['name' => 'Mewari',                 'script' => 'Latn', 'native' => 'Mewari', 'flag_code' => '' ],
        //'mua'         => ['name' => 'Mundang',                'script' => 'Latn', 'native' => 'Mundang', 'flag_code' => '' ],
        //'mi'          => ['name' => 'Māori',                  'script' => 'Latn', 'native' => 'Māori', 'flag_code' => '' ],
        //'nl'          => ['name' => 'Dutch',                  'script' => 'Latn', 'native' => 'Nederlands', 'flag_code' => '' ],
        //'nmg'         => ['name' => 'Kwasio',                 'script' => 'Latn', 'native' => 'ngumba', 'flag_code' => '' ],
        //'yav'         => ['name' => 'Yangben',                'script' => 'Latn', 'native' => 'nuasue', 'flag_code' => '' ],
        //'nn'          => ['name' => 'Norwegian Nynorsk',      'script' => 'Latn', 'native' => 'nynorsk', 'flag_code' => '' ],
        //'oc'          => ['name' => 'Occitan',                'script' => 'Latn', 'native' => 'occitan', 'flag_code' => '' ],
        //'ang'         => ['name' => 'Old English',            'script' => 'Runr', 'native' => 'Old English', 'flag_code' => '' ],
        //'xog'         => ['name' => 'Soga',                   'script' => 'Latn', 'native' => 'Olusoga', 'flag_code' => '' ],
        //'om'          => ['name' => 'Oromo',                  'script' => 'Latn', 'native' => 'Oromoo', 'flag_code' => '' ],
        //'ng'          => ['name' => 'Ndonga',                 'script' => 'Latn', 'native' => 'OshiNdonga', 'flag_code' => '' ],
        //'hz'          => ['name' => 'Herero',                 'script' => 'Latn', 'native' => 'Otjiherero', 'flag_code' => '' ],
        //'uz-Latn'     => ['name' => 'Uzbek (Latin)',          'script' => 'Latn', 'native' => 'oʼzbekcha', 'flag_code' => '' ],
        //'nds'         => ['name' => 'Low German',             'script' => 'Latn', 'native' => 'Plattdüütsch', 'flag_code' => '' ],
        //'pl'          => ['name' => 'Polish',                 'script' => 'Latn', 'native' => 'polski', 'flag_code' => '' ],
        //'pt'          => ['name' => 'Portuguese',             'script' => 'Latn', 'native' => 'português', 'flag_code' => '' ],
        //'pt-BR'       => ['name' => 'Brazilian Portuguese',   'script' => 'Latn', 'native' => 'português do Brasil', 'flag_code' => '' ],
        //'ff'          => ['name' => 'Fulah',                  'script' => 'Latn', 'native' => 'Pulaar', 'flag_code' => '' ],
        //'pi'          => ['name' => 'Pahari-Potwari',         'script' => 'Latn', 'native' => 'Pāli', 'flag_code' => '' ],
        //'aa'          => ['name' => 'Afar',                   'script' => 'Latn', 'native' => 'Qafar', 'flag_code' => '' ],
        //'ty'          => ['name' => 'Tahitian',               'script' => 'Latn', 'native' => 'Reo Māohi', 'flag_code' => '' ],
        //'ksf'         => ['name' => 'Bafia',                  'script' => 'Latn', 'native' => 'rikpa', 'flag_code' => '' ],
        //'ro'          => ['name' => 'Romanian',               'script' => 'Latn', 'native' => 'română', 'flag_code' => '' ],
        //'cgg'         => ['name' => 'Chiga',                  'script' => 'Latn', 'native' => 'Rukiga', 'flag_code' => '' ],
        //'rm'          => ['name' => 'Romansh',                'script' => 'Latn', 'native' => 'rumantsch', 'flag_code' => '' ],
        //'qu'          => ['name' => 'Quechua',                'script' => 'Latn', 'native' => 'Runa Simi', 'flag_code' => '' ],
        //'nyn'         => ['name' => 'Nyankole',               'script' => 'Latn', 'native' => 'Runyankore', 'flag_code' => '' ],
        //'ssy'         => ['name' => 'Saho',                   'script' => 'Latn', 'native' => 'Saho', 'flag_code' => '' ],
        //'sc'          => ['name' => 'Sardinian',              'script' => 'Latn', 'native' => 'sardu', 'flag_code' => '' ],
        //'de-CH'       => ['name' => 'Swiss High German',      'script' => 'Latn', 'native' => 'Schweizer Hochdeutsch', 'flag_code' => '' ],
        //'gsw'         => ['name' => 'Swiss German',           'script' => 'Latn', 'native' => 'Schwiizertüütsch', 'flag_code' => '' ],
        //'trv'         => ['name' => 'Taroko',                 'script' => 'Latn', 'native' => 'Seediq', 'flag_code' => '' ],
        //'seh'         => ['name' => 'Sena',                   'script' => 'Latn', 'native' => 'sena', 'flag_code' => '' ],
        //'nso'         => ['name' => 'Northern Sotho',         'script' => 'Latn', 'native' => 'Sesotho sa Leboa', 'flag_code' => '' ],
        //'st'          => ['name' => 'Southern Sotho',         'script' => 'Latn', 'native' => 'Sesotho', 'flag_code' => '' ],
        //'tn'          => ['name' => 'Tswana',                 'script' => 'Latn', 'native' => 'Setswana', 'flag_code' => '' ],
        //'sq'          => ['name' => 'Albanian',               'script' => 'Latn', 'native' => 'shqip', 'flag_code' => '' ],
        //'sid'         => ['name' => 'Sidamo',                 'script' => 'Latn', 'native' => 'Sidaamu Afo', 'flag_code' => '' ],
        //'ss'          => ['name' => 'Swati',                  'script' => 'Latn', 'native' => 'Siswati', 'flag_code' => '' ],
        //'sk'          => ['name' => 'Slovak',                 'script' => 'Latn', 'native' => 'slovenčina', 'flag_code' => '' ],
        //'sl'          => ['name' => 'Slovene',                'script' => 'Latn', 'native' => 'slovenščina', 'flag_code' => '' ],
        //'so'          => ['name' => 'Somali',                 'script' => 'Latn', 'native' => 'Soomaali', 'flag_code' => '' ],
        //'sr-Latn'     => ['name' => 'Serbian (Latin)',        'script' => 'Latn', 'native' => 'Srpski', 'flag_code' => '' ],
        //'sh'          => ['name' => 'Serbo-Croatian',         'script' => 'Latn', 'native' => 'srpskohrvatski', 'flag_code' => '' ],
        //'fi'          => ['name' => 'Finnish',                'script' => 'Latn', 'native' => 'suomi', 'flag_code' => '' ],
        //'sv'          => ['name' => 'Swedish',                'script' => 'Latn', 'native' => 'svenska', 'flag_code' => '' ],
        //'sg'          => ['name' => 'Sango',                  'script' => 'Latn', 'native' => 'Sängö', 'flag_code' => '' ],
        //'tl'          => ['name' => 'Tagalog',                'script' => 'Latn', 'native' => 'Tagalog', 'flag_code' => '' ],
        //'tzm-Latn'    => ['name' => 'Central Atlas Tamazight (Latin)', 'script' => 'Latn', 'native' => 'Tamazight', 'flag_code' => '' ],
        //'kab'         => ['name' => 'Kabyle',                 'script' => 'Latn', 'native' => 'Taqbaylit', 'flag_code' => '' ],
        //'twq'         => ['name' => 'Tasawaq',                'script' => 'Latn', 'native' => 'Tasawaq senni', 'flag_code' => '' ],
        //'shi'         => ['name' => 'Tachelhit (Latin)',      'script' => 'Latn', 'native' => 'Tashelhit', 'flag_code' => '' ],
        //'nus'         => ['name' => 'Nuer',                   'script' => 'Latn', 'native' => 'Thok Nath', 'flag_code' => '' ],
        //'vi'          => ['name' => 'Vietnamese',             'script' => 'Latn', 'native' => 'Tiếng Việt', 'flag_code' => '' ],
        //'tg-Latn'     => ['name' => 'Tajik (Latin)',          'script' => 'Latn', 'native' => 'tojikī', 'flag_code' => '' ],
        //'lu'          => ['name' => 'Luba-Katanga',           'script' => 'Latn', 'native' => 'Tshiluba', 'flag_code' => '' ],
        //'ve'          => ['name' => 'Venda',                  'script' => 'Latn', 'native' => 'Tshivenḓa', 'flag_code' => '' ],
        //'tw'          => ['name' => 'Twi',                    'script' => 'Latn', 'native' => 'Twi', 'flag_code' => '' ],
        //'tr'          => ['name' => 'Turkish',                'script' => 'Latn', 'native' => 'Türkçe', 'flag_code' => '' ],
        //'ale'         => ['name' => 'Aleut',                  'script' => 'Latn', 'native' => 'Unangax tunuu', 'flag_code' => '' ],
        //'ca-valencia' => ['name' => 'Valencian',              'script' => 'Latn', 'native' => 'valencià', 'flag_code' => '' ],
        //'vai-Latn'    => ['name' => 'Vai (Latin)',            'script' => 'Latn', 'native' => 'Viyamíĩ', 'flag_code' => '' ],
        //'vo'          => ['name' => 'Volapük',                'script' => 'Latn', 'native' => 'Volapük', 'flag_code' => '' ],
        //'fj'          => ['name' => 'Fijian',                 'script' => 'Latn', 'native' => 'vosa Vakaviti', 'flag_code' => '' ],
        //'wa'          => ['name' => 'Walloon',                'script' => 'Latn', 'native' => 'Walon', 'flag_code' => '' ],
        //'wae'         => ['name' => 'Walser',                 'script' => 'Latn', 'native' => 'Walser', 'flag_code' => '' ],
        //'wen'         => ['name' => 'Sorbian',                'script' => 'Latn', 'native' => 'Wendic', 'flag_code' => '' ],
        //'wo'          => ['name' => 'Wolof',                  'script' => 'Latn', 'native' => 'Wolof', 'flag_code' => '' ],
        //'ts'          => ['name' => 'Tsonga',                 'script' => 'Latn', 'native' => 'Xitsonga', 'flag_code' => '' ],
        //'dje'         => ['name' => 'Zarma',                  'script' => 'Latn', 'native' => 'Zarmaciine', 'flag_code' => '' ],
        //'yo'          => ['name' => 'Yoruba',                 'script' => 'Latn', 'native' => 'Èdè Yorùbá', 'flag_code' => '' ],
        // 'de-AT'       => ['name' => 'Austrian German',        'script' => 'Latn', 'native' => 'Österreichisches Deutsch', 'flag_code' => '' ],
        //'is'          => ['name' => 'Icelandic',              'script' => 'Latn', 'native' => 'íslenska', 'flag_code' => '' ],
        //'cs'          => ['name' => 'Czech',                  'script' => 'Latn', 'native' => 'čeština', 'flag_code' => '' ],
        //'bas'         => ['name' => 'Basa',                   'script' => 'Latn', 'native' => 'Ɓàsàa', 'flag_code' => '' ],
        //'mas'         => ['name' => 'Masai',                  'script' => 'Latn', 'native' => 'ɔl-Maa', 'flag_code' => '' ],
        //'haw'         => ['name' => 'Hawaiian',               'script' => 'Latn', 'native' => 'ʻŌlelo Hawaiʻi', 'flag_code' => '' ],
        //'el'          => ['name' => 'Greek',                  'script' => 'Grek', 'native' => 'Ελληνικά', 'flag_code' => '' ],
        //'uz'          => ['name' => 'Uzbek (Cyrillic)',       'script' => 'Cyrl', 'native' => 'Ўзбек', 'flag_code' => '' ],
        //'az-Cyrl'     => ['name' => 'Azerbaijani (Cyrillic)', 'script' => 'Cyrl', 'native' => 'Азәрбајҹан', 'flag_code' => '' ],
        //'ab'          => ['name' => 'Abkhazian',              'script' => 'Cyrl', 'native' => 'Аҧсуа', 'flag_code' => '' ],
        //'os'          => ['name' => 'Ossetic',                'script' => 'Cyrl', 'native' => 'Ирон', 'flag_code' => '' ],
        //'ky'          => ['name' => 'Kyrgyz',                 'script' => 'Cyrl', 'native' => 'Кыргыз', 'flag_code' => '' ],
        //'sr'          => ['name' => 'Serbian (Cyrillic)',     'script' => 'Cyrl', 'native' => 'Српски', 'flag_code' => '' ],
        //'av'          => ['name' => 'Avaric',                 'script' => 'Cyrl', 'native' => 'авар мацӀ', 'flag_code' => '' ],
        //'ady'         => ['name' => 'Adyghe',                 'script' => 'Cyrl', 'native' => 'адыгэбзэ', 'flag_code' => '' ],
        //'ba'          => ['name' => 'Bashkir',                'script' => 'Cyrl', 'native' => 'башҡорт теле', 'flag_code' => '' ],
        //'be'          => ['name' => 'Belarusian',             'script' => 'Cyrl', 'native' => 'беларуская', 'flag_code' => '' ],
        //'bg'          => ['name' => 'Bulgarian',              'script' => 'Cyrl', 'native' => 'български', 'flag_code' => '' ],
        //'kv'          => ['name' => 'Komi',                   'script' => 'Cyrl', 'native' => 'коми кыв', 'flag_code' => '' ],
        //'mk'          => ['name' => 'Macedonian',             'script' => 'Cyrl', 'native' => 'македонски', 'flag_code' => '' ],
        //'mn'          => ['name' => 'Mongolian (Cyrillic)',   'script' => 'Cyrl', 'native' => 'монгол', 'flag_code' => '' ],
        //'ce'          => ['name' => 'Chechen',                'script' => 'Cyrl', 'native' => 'нохчийн мотт', 'flag_code' => '' ],
        //'ru'          => ['name' => 'Russian',                'script' => 'Cyrl', 'native' => 'русский', 'flag_code' => '' ],
        //'sah'         => ['name' => 'Yakut',                  'script' => 'Cyrl', 'native' => 'саха тыла', 'flag_code' => '' ],
        //'tt'          => ['name' => 'Tatar',                  'script' => 'Cyrl', 'native' => 'татар теле', 'flag_code' => '' ],
        //'tg'          => ['name' => 'Tajik (Cyrillic)',       'script' => 'Cyrl', 'native' => 'тоҷикӣ', 'flag_code' => '' ],
        //'tk'          => ['name' => 'Turkmen',                'script' => 'Cyrl', 'native' => 'түркменче', 'flag_code' => '' ],
        //'uk'          => ['name' => 'Ukrainian',              'script' => 'Cyrl', 'native' => 'українська', 'flag_code' => '' ],
        //'cv'          => ['name' => 'Chuvash',                'script' => 'Cyrl', 'native' => 'чӑваш чӗлхи', 'flag_code' => '' ],
        //'cu'          => ['name' => 'Church Slavic',          'script' => 'Cyrl', 'native' => 'ѩзыкъ словѣньскъ', 'flag_code' => '' ],
        //'kk'          => ['name' => 'Kazakh',                 'script' => 'Cyrl', 'native' => 'қазақ тілі', 'flag_code' => '' ],
        //'hy'          => ['name' => 'Armenian',               'script' => 'Armn', 'native' => 'Հայերեն', 'flag_code' => '' ],
        //'yi'          => ['name' => 'Yiddish',                'script' => 'Hebr', 'native' => 'ייִדיש', 'flag_code' => '' ],
        //'he'          => ['name' => 'Hebrew',                 'script' => 'Hebr', 'native' => 'עברית', 'flag_code' => '' ],
        //'ug'          => ['name' => 'Uyghur',                 'script' => 'Arab', 'native' => 'ئۇيغۇرچە', 'flag_code' => '' ],
        //'ur'          => ['name' => 'Urdu',                   'script' => 'Arab', 'native' => 'اردو', 'flag_code' => '' ],
        //'uz-Arab'     => ['name' => 'Uzbek (Arabic)',         'script' => 'Arab', 'native' => 'اۉزبېک', 'flag_code' => '' ],
        //'tg-Arab'     => ['name' => 'Tajik (Arabic)',         'script' => 'Arab', 'native' => 'تاجیکی', 'flag_code' => '' ],
        //'sd'          => ['name' => 'Sindhi',                 'script' => 'Arab', 'native' => 'سنڌي', 'flag_code' => '' ],
        //'fa'          => ['name' => 'Persian',                'script' => 'Arab', 'native' => 'فارسی', 'flag_code' => '' ],
        //'pa-Arab'     => ['name' => 'Punjabi (Arabic)',       'script' => 'Arab', 'native' => 'پنجاب', 'flag_code' => '' ],
        //'ps'          => ['name' => 'Pashto',                 'script' => 'Arab', 'native' => 'پښتو', 'flag_code' => '' ],
        //'ks'          => ['name' => 'Kashmiri (Arabic)',      'script' => 'Arab', 'native' => 'کأشُر', 'flag_code' => '' ],
        //'ku'          => ['name' => 'Kurdish',                'script' => 'Arab', 'native' => 'کوردی', 'flag_code' => '' ],
        //'dv'          => ['name' => 'Divehi',                 'script' => 'Thaa', 'native' => 'ދިވެހިބަސް', 'flag_code' => '' ],
        //'ks-Deva'     => ['name' => 'Kashmiri (Devaganari)',  'script' => 'Deva', 'native' => 'कॉशुर', 'flag_code' => '' ],
        //'kok'         => ['name' => 'Konkani',                'script' => 'Deva', 'native' => 'कोंकणी', 'flag_code' => '' ],
        //'doi'         => ['name' => 'Dogri',                  'script' => 'Deva', 'native' => 'डोगरी', 'flag_code' => '' ],
        //'ne'          => ['name' => 'Nepali',                 'script' => 'Deva', 'native' => 'नेपाली', 'flag_code' => '' ],
        //'pra'         => ['name' => 'Prakrit',                'script' => 'Deva', 'native' => 'प्राकृत', 'flag_code' => '' ],
        //'brx'         => ['name' => 'Bodo',                   'script' => 'Deva', 'native' => 'बड़ो', 'flag_code' => '' ],
        //'bra'         => ['name' => 'Braj',                   'script' => 'Deva', 'native' => 'ब्रज भाषा', 'flag_code' => '' ],
        //'mr'          => ['name' => 'Marathi',                'script' => 'Deva', 'native' => 'मराठी', 'flag_code' => '' ],
        //'mai'         => ['name' => 'Maithili',               'script' => 'Tirh', 'native' => 'मैथिली', 'flag_code' => '' ],
        //'raj'         => ['name' => 'Rajasthani',             'script' => 'Deva', 'native' => 'राजस्थानी', 'flag_code' => '' ],
        //'sa'          => ['name' => 'Sanskrit',               'script' => 'Deva', 'native' => 'संस्कृतम्', 'flag_code' => '' ],
        //'hi'          => ['name' => 'Hindi',                  'script' => 'Deva', 'native' => 'हिन्दी', 'flag_code' => '' ],
        //'as'          => ['name' => 'Assamese',               'script' => 'Beng', 'native' => 'অসমীয়া', 'flag_code' => '' ],
        //'bn'          => ['name' => 'Bengali',                'script' => 'Beng', 'native' => 'বাংলা', 'flag_code' => '' ],
        //'mni'         => ['name' => 'Manipuri',               'script' => 'Beng', 'native' => 'মৈতৈ', 'flag_code' => '' ],
        //'pa'          => ['name' => 'Punjabi (Gurmukhi)',     'script' => 'Guru', 'native' => 'ਪੰਜਾਬੀ', 'flag_code' => '' ],
        //'gu'          => ['name' => 'Gujarati',               'script' => 'Gujr', 'native' => 'ગુજરાતી', 'flag_code' => '' ],
        //'or'          => ['name' => 'Oriya',                  'script' => 'Orya', 'native' => 'ଓଡ଼ିଆ', 'flag_code' => '' ],
        //'ta'          => ['name' => 'Tamil',                  'script' => 'Taml', 'native' => 'தமிழ்', 'flag_code' => '' ],
        //'te'          => ['name' => 'Telugu',                 'script' => 'Telu', 'native' => 'తెలుగు', 'flag_code' => '' ],
        //'kn'          => ['name' => 'Kannada',                'script' => 'Knda', 'native' => 'ಕನ್ನಡ', 'flag_code' => '' ],
        //'ml'          => ['name' => 'Malayalam',              'script' => 'Mlym', 'native' => 'മലയാളം', 'flag_code' => '' ],
        //'si'          => ['name' => 'Sinhala',                'script' => 'Sinh', 'native' => 'සිංහල', 'flag_code' => '' ],
        //'th'          => ['name' => 'Thai',                   'script' => 'Thai', 'native' => 'ไทย', 'flag_code' => '' ],
        //'lo'          => ['name' => 'Lao',                    'script' => 'Laoo', 'native' => 'ລາວ', 'flag_code' => '' ],
        //'bo'          => ['name' => 'Tibetan',                'script' => 'Tibt', 'native' => 'པོད་སྐད་', 'flag_code' => '' ],
        //'dz'          => ['name' => 'Dzongkha',               'script' => 'Tibt', 'native' => 'རྫོང་ཁ', 'flag_code' => '' ],
        //'my'          => ['name' => 'Burmese',                'script' => 'Mymr', 'native' => 'မြန်မာဘာသာ', 'flag_code' => '' ],
        //'ka'          => ['name' => 'Georgian',               'script' => 'Geor', 'native' => 'ქართული', 'flag_code' => '' ],
        //'byn'         => ['name' => 'Blin',                   'script' => 'Ethi', 'native' => 'ብሊን', 'flag_code' => '' ],
        //'tig'         => ['name' => 'Tigre',                  'script' => 'Ethi', 'native' => 'ትግረ', 'flag_code' => '' ],
        //'ti'          => ['name' => 'Tigrinya',               'script' => 'Ethi', 'native' => 'ትግርኛ', 'flag_code' => '' ],
        //'am'          => ['name' => 'Amharic',                'script' => 'Ethi', 'native' => 'አማርኛ', 'flag_code' => '' ],
        //'wal'         => ['name' => 'Wolaytta',               'script' => 'Ethi', 'native' => 'ወላይታቱ', 'flag_code' => '' ],
        //'chr'         => ['name' => 'Cherokee',               'script' => 'Cher', 'native' => 'ᏣᎳᎩ', 'flag_code' => '' ],
        //'iu'          => ['name' => 'Inuktitut (Canadian Aboriginal Syllabics)', 'script' => 'Cans', 'native' => 'ᐃᓄᒃᑎᑐᑦ', 'flag_code' => '' ],
        //'oj'          => ['name' => 'Ojibwa',                 'script' => 'Cans', 'native' => 'ᐊᓂᔑᓈᐯᒧᐎᓐ', 'flag_code' => '' ],
        //'cr'          => ['name' => 'Cree',                   'script' => 'Cans', 'native' => 'ᓀᐦᐃᔭᐍᐏᐣ', 'flag_code' => '' ],
        //'km'          => ['name' => 'Khmer',                  'script' => 'Khmr', 'native' => 'ភាសាខ្មែរ', 'flag_code' => '' ],
        //'mn-Mong'     => ['name' => 'Mongolian (Mongolian)',  'script' => 'Mong', 'native' => 'ᠮᠣᠨᠭᠭᠣᠯ ᠬᠡᠯᠡ', 'flag_code' => '' ],
        //'shi-Tfng'    => ['name' => 'Tachelhit (Tifinagh)',   'script' => 'Tfng', 'native' => 'ⵜⴰⵎⴰⵣⵉⵖⵜ', 'flag_code' => '' ],
        //'tzm'         => ['name' => 'Central Atlas Tamazight (Tifinagh)','script' => 'Tfng', 'native' => 'ⵜⴰⵎⴰⵣⵉⵖⵜ', 'flag_code' => '' ],
        //'yue'         => ['name' => 'Yue',                    'script' => 'Hant', 'native' => '廣州話', 'flag_code' => '' ],
        //'ja'          => ['name' => 'Japanese',               'script' => 'Jpan', 'native' => '日本語', 'flag_code' => '' ],
        //'zh'          => ['name' => 'Chinese (Simplified)',   'script' => 'Hans', 'native' => '简体中文', 'flag_code' => '' ],
        //'zh-Hant'     => ['name' => 'Chinese (Traditional)',  'script' => 'Hant', 'native' => '繁體中文', 'flag_code' => '' ],
        //'ii'          => ['name' => 'Sichuan Yi',             'script' => 'Yiii', 'native' => 'ꆈꌠꉙ', 'flag_code' => '' ],
        //'vai'         => ['name' => 'Vai (Vai)',              'script' => 'Vaii', 'native' => 'ꕙꔤ', 'flag_code' => '' ],
        //'jv-Java'     => ['name' => 'Javanese (Javanese)',    'script' => 'Java', 'native' => 'ꦧꦱꦗꦮ', 'flag_code' => '' ],
        //'ko'          => ['name' => 'Korean',                 'script' => 'Hang', 'native' => '한국어', 'flag_code' => '' ],
    ],
];
