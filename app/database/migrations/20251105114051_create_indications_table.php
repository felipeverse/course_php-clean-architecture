<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreateIndicationsTable extends AbstractMigration
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
        $this->table('indications', ['id' => false, 'primary_key' => ['indicator_cpf', 'indicated_cpf']])
            ->addColumn('indicator_cpf', 'string', ['null' => false])
            ->addForeignKey('indicator_cpf', 'students', 'cpf', ['update' => 'CASCADE', 'delete' => 'CASCADE'])
            ->addColumn('indicated_cpf', 'string', ['null' => false])
            ->addForeignKey('indicated_cpf', 'students', 'cpf', ['update' => 'CASCADE', 'delete' => 'CASCADE'])
            ->addColumn('indication_date', 'datetime')
            ->addTimestamps()
            ->create();
    }
}
