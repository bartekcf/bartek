<?php

use yii\db\Migration;

/**
 * Class m230228_170745_add_user
 */
class m230228_170745_add_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('user',[
            'created_at' => time(),
            'updated_at' => time(),
            'username' => 'codefellow',
            'password_hash' => '$2y$13$U0lMW753eYBQP6sCP2kxlOxZ6569k5AXWryKcr2onql6lwulCfJuK',
            'password_reset_token' => null,
            'auth_key' => 'greregre34t43g',
            'email' => 'codefellow@cf.pl',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->delete('user', ['username' => 'codefellow']);
    }
}
