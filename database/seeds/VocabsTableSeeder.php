<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class VocabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // fills out initial values of table
        DB::table('vocabs')->insert([
            [
            'word' => '猫',
            'pronunciation' => 'ねこ',
            'meaning' => 'CAT',
            'sentence' => '猫が可愛いです。'
            ],[
            'word' => '卒業式',
            'pronunciation' => 'そつぎょうしき',
            'meaning' => 'GRADUATION',
            'sentence' => NULL
            ],
            [
            'word' => 'ニコニコ',
            'pronunciation' => NULL,
            'meaning' => 'SMILE',
            'sentence' => 'その人はいつもニコニコしてる。'
            ],[
            'word' => '脱税',
            'pronunciation' => 'だつぜい',
            'meaning' => 'TAX EVASION',
            'sentence' => '脱税しようとした。'
            ]
          ]
        );
    }
}
