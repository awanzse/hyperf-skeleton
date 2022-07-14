<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */
namespace App\Controller;

use Hyperf\DbConnection\Db;
use Hyperf\HttpServer\Contract\RequestInterface;

class UserController extends AbstractController
{
    public function login(RequestInterface $request)
    {
        $user = $this->request->input('user', 'Hydperf');
        $method = $this->request->getMethod();
        // Db::table('users')->insert(
        //     ['name' => 'sunky1', 'pass' => 123456]
        // );
        $data = Db::table('users')->where([
            ['name', '=', $request->input('name')],
            ['pass', '=', $request->input('pass')],
        ])->first();
        
        if ($data) {
            return [
                'method' => $method,
                'status'=>1,
                'message' => "Hello {$request->input('name')}."
            ];
        } else {
            return [
                'method' => $method,
                'status'=>0,
                'message' => "Username and password not found in database"
            ];
        }
    }
}
