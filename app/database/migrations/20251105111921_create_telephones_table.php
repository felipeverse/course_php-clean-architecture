<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateTelephonesTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $this->table('telephones', ['id' => false, 'primary_key' => ['ddd', 'numero']])
            ->addColumn('ddd', 'string', ['null' => false])
            ->addColumn('number', 'string', ['null' => false])
            ->addColumn('student_cpf', 'string')
            ->addForeignKey('student_cpf', 'students', 'cpf', ['update' => 'CASCADE', 'delete' => 'CASCADE'])
            ->addTimestamps()
            ->create();
    }
}
