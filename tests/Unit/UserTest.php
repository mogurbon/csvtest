<?php

namespace Tests\Unit;

use App\Imports\UserImport;
use Maatwebsite\Excel\Facades\Excel;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $this->assertTrue(true);
    }

    public function user_can_import_users()
    {
        Excel::fake();



        // When passing the callback as 2nd param, the disk will be the default disk.
        Excel::assertImported('upload.csv', function(UserImport $import) {
            return true;
        });
    }
}
