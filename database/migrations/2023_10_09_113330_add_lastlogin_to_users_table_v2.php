<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    class AddLastLoginToUsersTableV2 extends Migration
    {
        /**
         * Exécute les migrations.
         */
        public function up()
        {
            Schema::table('users', function (Blueprint $table) {
                $table->timestamp('lastlogin')->nullable();
            });
        }

        /**
         * Revertit les migrations.
         */
        public function down()
        {
            Schema::table('users', function (Blueprint $table) {
                $table->dropColumn('lastlogin');
            });
        }
    }
