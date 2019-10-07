<?php


namespace EasySwoole\Mysqli\Tests;


use EasySwoole\Mysqli\QueryBuilder;
use PHPUnit\Framework\TestCase;

class QueryBuilderTest extends TestCase
{
    protected $builder;
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        $this->builder = new QueryBuilder();
        parent::__construct($name, $data, $dataName);
    }

    function testGet()
    {
        $this->builder->get('get');
        $this->assertEquals('SELECT  * FROM get',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  * FROM get',$this->builder->getLastQuery());
        $this->assertEquals([],$this->builder->getLastBindParams());

        $this->builder->get('get',1);
        $this->assertEquals('SELECT  * FROM get LIMIT 1',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  * FROM get LIMIT 1',$this->builder->getLastQuery());
        $this->assertEquals([],$this->builder->getLastBindParams());

        $this->builder->get('get',[2,10]);
        $this->assertEquals('SELECT  * FROM get LIMIT 2, 10',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  * FROM get LIMIT 2, 10',$this->builder->getLastQuery());
        $this->assertEquals([],$this->builder->getLastBindParams());

        $this->builder->get('get',null,['col1','col2']);
        $this->assertEquals('SELECT  col1, col2 FROM get',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  col1, col2 FROM get',$this->builder->getLastQuery());
        $this->assertEquals([],$this->builder->getLastBindParams());

        $this->builder->get('get',1,['col1','col2']);
        $this->assertEquals('SELECT  col1, col2 FROM get LIMIT 1',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  col1, col2 FROM get LIMIT 1',$this->builder->getLastQuery());
        $this->assertEquals([],$this->builder->getLastBindParams());

        $this->builder->get('get',[2,10],['col1','col2']);
        $this->assertEquals('SELECT  col1, col2 FROM get LIMIT 2, 10',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  col1, col2 FROM get LIMIT 2, 10',$this->builder->getLastQuery());
        $this->assertEquals([],$this->builder->getLastBindParams());


        $this->builder->get('get',[2,10],['distinct col1','col2']);
        $this->assertEquals('SELECT  distinct col1, col2 FROM get LIMIT 2, 10',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  distinct col1, col2 FROM get LIMIT 2, 10',$this->builder->getLastQuery());
        $this->assertEquals([],$this->builder->getLastBindParams());
    }

    function testWhereGet()
    {
        $this->builder->where('col1',2)->get('whereGet');
        $this->assertEquals('SELECT  * FROM whereGet WHERE  col1 = ? ',$this->builder->getLastPrepareQuery());
        $this->assertEquals("SELECT  * FROM whereGet WHERE  col1 = 2 ",$this->builder->getLastQuery());
        $this->assertEquals([2],$this->builder->getLastBindParams());

        $this->builder->where('col1',2,">")->get('whereGet');
        $this->assertEquals('SELECT  * FROM whereGet WHERE  col1 > ? ',$this->builder->getLastPrepareQuery());
        $this->assertEquals("SELECT  * FROM whereGet WHERE  col1 > 2 ",$this->builder->getLastQuery());
        $this->assertEquals([2],$this->builder->getLastBindParams());

        $this->builder->where('col1',2)->where('col2','str')->get('whereGet');
        $this->assertEquals('SELECT  * FROM whereGet WHERE  col1 = ?  AND col2 = ? ',$this->builder->getLastPrepareQuery());
        $this->assertEquals("SELECT  * FROM whereGet WHERE  col1 = 2  AND col2 = 'str' ",$this->builder->getLastQuery());
        $this->assertEquals([2,'str'],$this->builder->getLastBindParams());

        $this->builder->where('col3',[1,2,3],'IN')->get('whereGet');
        $this->assertEquals('SELECT  * FROM whereGet WHERE  col3 IN ( ?, ?, ? ) ',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  * FROM whereGet WHERE  col3 IN ( 1, 2, 3 ) ',$this->builder->getLastQuery());
        $this->assertEquals([1,2,3],$this->builder->getLastBindParams());
    }

    function testJoinGet()
    {
        $this->builder->join('table2','table2.col1 = getTable.col2')->get('getTable');
        $this->assertEquals('SELECT  * FROM getTable  JOIN table2 on table2.col1 = getTable.col2',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  * FROM getTable  JOIN table2 on table2.col1 = getTable.col2',$this->builder->getLastQuery());
        $this->assertEquals([],$this->builder->getLastBindParams());

        $this->builder->join('table2','table2.col1 = getTable.col2','LEFT')->get('getTable');
        $this->assertEquals('SELECT  * FROM getTable LEFT JOIN table2 on table2.col1 = getTable.col2',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  * FROM getTable LEFT JOIN table2 on table2.col1 = getTable.col2',$this->builder->getLastQuery());
        $this->assertEquals([],$this->builder->getLastBindParams());
    }

    function testJoinWhereGet()
    {
        $this->builder->join('table2','table2.col1 = getTable.col2')->where('table2.col1',2)->get('getTable');
        $this->assertEquals('SELECT  * FROM getTable  JOIN table2 on table2.col1 = getTable.col2 WHERE  table2.col1 = ? ',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  * FROM getTable  JOIN table2 on table2.col1 = getTable.col2 WHERE  table2.col1 = 2 ',$this->builder->getLastQuery());
        $this->assertEquals([2],$this->builder->getLastBindParams());
    }

    function testUpdate()
    {
        $this->builder->update('updateTable', ['a' => 1]);
        $this->assertEquals('UPDATE updateTable SET `a` = ?', $this->builder->getLastPrepareQuery());
        $this->assertEquals('UPDATE updateTable SET `a` = 1', $this->builder->getLastQuery());
        $this->assertEquals([1], $this->builder->getLastBindParams());
    }

    function testLimitUpdate()
    {
        $this->builder->update('updateTable', ['a' => 1], 5);
        $this->assertEquals('UPDATE updateTable SET `a` = ? LIMIT 5', $this->builder->getLastPrepareQuery());
        $this->assertEquals('UPDATE updateTable SET `a` = 1 LIMIT 5', $this->builder->getLastQuery());
        $this->assertEquals([1], $this->builder->getLastBindParams());
    }

    function testWhereUpdate()
    {
        $this->builder->where('whereUpdate', 'whereValue')->update('updateTable', ['a' => 1]);
        $this->assertEquals('UPDATE updateTable SET `a` = ? WHERE  whereUpdate = ? ', $this->builder->getLastPrepareQuery());
        $this->assertEquals("UPDATE updateTable SET `a` = 1 WHERE  whereUpdate = 'whereValue' ", $this->builder->getLastQuery());
        $this->assertEquals([1, 'whereValue'], $this->builder->getLastBindParams());
    }

    /**
     * @throws \Exception
     */
    function testLockWhereLimitUpdate()
    {
        $this->builder->setQueryOption("FOR UPDATE")->where('whereUpdate', 'whereValue')->update('updateTable', ['a' => 1], 2);
        $this->assertEquals('UPDATE updateTable SET `a` = ? WHERE  whereUpdate = ?  LIMIT 2 FOR UPDATE', $this->builder->getLastPrepareQuery());
        $this->assertEquals("UPDATE updateTable SET `a` = 1 WHERE  whereUpdate = 'whereValue'  LIMIT 2 FOR UPDATE", $this->builder->getLastQuery());
        $this->assertEquals([1, 'whereValue'], $this->builder->getLastBindParams());
    }


    function testDelete()
    {
        $this->builder->delete('deleteTable');
        $this->assertEquals('DELETE FROM deleteTable', $this->builder->getLastPrepareQuery());
        $this->assertEquals('DELETE FROM deleteTable', $this->builder->getLastQuery());
        $this->assertEquals([], $this->builder->getLastBindParams());
    }

    function testLimitDelete()
    {
        $this->builder->delete('deleteTable', 1);
        $this->assertEquals('DELETE FROM deleteTable LIMIT 1', $this->builder->getLastPrepareQuery());
        $this->assertEquals('DELETE FROM deleteTable LIMIT 1', $this->builder->getLastQuery());
        $this->assertEquals([], $this->builder->getLastBindParams());
    }

    function testWhereDelete()
    {
        $this->builder->where('whereDelete', 'whereValue')->delete('deleteTable');
        $this->assertEquals('DELETE FROM deleteTable WHERE  whereDelete = ? ', $this->builder->getLastPrepareQuery());
        $this->assertEquals("DELETE FROM deleteTable WHERE  whereDelete = 'whereValue' ", $this->builder->getLastQuery());
        $this->assertEquals(['whereValue'], $this->builder->getLastBindParams());
    }

    function testInsert()
    {
        $this->builder->insert('insertTable', ['a' => 1, 'b' => "b"]);
        $this->assertEquals('INSERT  INTO insertTable (`a`, `b`)  VALUES (?, ?)', $this->builder->getLastPrepareQuery());
        $this->assertEquals("INSERT  INTO insertTable (`a`, `b`)  VALUES (1, 'b')", $this->builder->getLastQuery());
        $this->assertEquals([1,'b'], $this->builder->getLastBindParams());
    }

    function testSubQuery()
    {
        $sub = $this->builder::subQuery();
        $sub->where ("qty", 2, ">");
        $sub->get ("products", null, "userId");
        $this->builder->where ("id", $sub, 'in')->get('users');
        $this->assertEquals('SELECT  * FROM users WHERE  id in (  (SELECT  userId FROM products WHERE  qty > ? )  ) ',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  * FROM users WHERE  id in (  (SELECT  userId FROM products WHERE  qty > 2 )  ) ',$this->builder->getLastQuery());
        $this->assertEquals([2],$this->builder->getLastBindParams());


        $sub = $this->builder::subQuery();
        $sub->where ("qty", 2, ">");
        $sub->get ("products", null, "userId");
        $this->builder->where('col2',1)->where ("id", $sub, 'in')->get('users');
        $this->assertEquals('SELECT  * FROM users WHERE  col2 = ?  AND id in (  (SELECT  userId FROM products WHERE  qty > ? )  ) ',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  * FROM users WHERE  col2 = 1  AND id in (  (SELECT  userId FROM products WHERE  qty > 2 )  ) ',$this->builder->getLastQuery());
        $this->assertEquals([1,2],$this->builder->getLastBindParams());

        $userIdQ = $this->builder::subQuery();
        $userIdQ->where ("id", 6);
        $userIdQ->getOne ("users", "name");

        $data = Array (
            "productName" => "test product",
            "userId" => $userIdQ,
            "lastUpdated" => $this->builder->now()
        );
        $this->builder->insert ("products", $data);
        $this->assertEquals('INSERT  INTO products (`productName`, `userId`, `lastUpdated`)  VALUES (?,   (SELECT  name FROM users WHERE  id = ?  LIMIT 1) , NOW())',$this->builder->getLastPrepareQuery());
        $this->assertEquals("INSERT  INTO products (`productName`, `userId`, `lastUpdated`)  VALUES ('test product',   (SELECT  name FROM users WHERE  id = 6  LIMIT 1) , NOW())",$this->builder->getLastQuery());
        $this->assertEquals(["test product",6],$this->builder->getLastBindParams());


        $usersQ = $this->builder::subQuery ("u");
        $usersQ->where ("active", 1);
        $usersQ->get ("users");

        $this->builder->join($usersQ, "p.userId=u.id", "LEFT");
        $this->builder->get ("products p", null, "u.login, p.productName");
        $this->assertEquals('SELECT  u.login, p.productName FROM products p LEFT JOIN   (SELECT  * FROM users WHERE  active = ? ) u on p.userId=u.id',$this->builder->getLastPrepareQuery());
        $this->assertEquals('SELECT  u.login, p.productName FROM products p LEFT JOIN   (SELECT  * FROM users WHERE  active = 1 ) u on p.userId=u.id',$this->builder->getLastQuery());
        $this->assertEquals([1],$this->builder->getLastBindParams());

    }

    public function testUnion()
    {
        $this->builder->union((new QueryBuilder)->where('userName', 'user')->get('user'))->where('adminUserName', 'admin')->get('admin');
        $this->assertEquals('SELECT  * FROM admin WHERE  adminUserName = ? UNION SELECT  * FROM user WHERE  userName = ? ', $this->builder->getLastPrepareQuery());
        $this->assertEquals("SELECT  * FROM admin WHERE  adminUserName = 'admin' UNION SELECT  * FROM user WHERE  userName = 'user' ", $this->builder->getLastQuery());
        $this->assertEquals(['admin','user'],$this->builder->getLastBindParams());
    }
}