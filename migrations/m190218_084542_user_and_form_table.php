<?php

use yii\db\Migration;

/**
 * Class m190218_084542_user_and_form_table
 */
class m190218_084542_user_and_form_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string(),
            'password_reset_token' => $this->string()->null()->unique(),
            'email' => $this->string()->unique()->notNull(),
            'email_confirm_token' => $this->string()->null()->unique(),
            'token' => $this->string()->null()->unique(),
            'name' => $this->string(),
            'status' => $this->smallInteger()->notNull()->defaultValue(10),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'updated_at' => $this->integer()->unsigned()->notNull(),
            'activated_at' => $this->integer()->unsigned(),
            'token_expired' => $this->integer()->unsigned(),
        ], $tableOptions);

        $this->createTable('{{%request}}', [
            'id' => $this->primaryKey(),
            'applicant_id' => $this->integer(),
            'php' => $this->string(),
            'sql' => $this->string(),
            'css' => $this->string(),
            'js' => $this->string(),
            'php_framework' => $this->string(),
            'js_framework' => $this->string(),
            'experience' => $this->string(),
            'study' => $this->string(),
            'work' => $this->string(),
            'income' => $this->string(),
            'ability' => $this->string(),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'updated_at' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->createTable('{{%applicant}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'email' => $this->string()->unique()->notNull(),
            'sex' => $this->string(),
            'age' => $this->integer(),
            'phone' => $this->string(),
            'created_at' => $this->integer()->unsigned()->notNull(),
            'updated_at' => $this->integer()->unsigned()->notNull(),
        ], $tableOptions);

        $this->addForeignKey('{{%fk-request_applicant_id}}', '{{%request}}', 'applicant_id', '{{%applicant}}', 'id', 'CASCADE', 'RESTRICT');
        $this->createIndex('{{%idx-applicant_email}}', '{{%applicant}}', 'email');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%user}}');
        $this->dropTable('{{%request}}');
        $this->dropTable('{{%applicant}}');
    }
}
