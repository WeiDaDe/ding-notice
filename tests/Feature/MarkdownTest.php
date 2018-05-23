<?php

namespace DingNotice\Tests\Feature;

use DingNotice\Tests\TestCase;


class MarkDownTest extends TestCase
{
    protected $title = "杭州天气";
    protected $markdown = "#### 杭州天气  \n ".
    "> 9度，@1825718XXXX 西北风1级，空气良89，相对温度73%\n\n ".
    "> ![screenshot](http://i01.lw.aliimg.com/media/lALPBbCc1ZhJGIvNAkzNBLA_1200_588.png)\n".
    "> ###### 10点20分发布 [天气](http://www.thinkpage.cn/) ";

    public function __construct($name = null, array $data = [], $dataName = '')
    {
        parent::__construct($name, $data, $dataName);
        $this->setUp();
    }

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testPushMarkdownMessage()
    {
        $result =$this->ding->markdown($this->title,$this->markdown);
        $this->assertSame("{\"errcode\":0,\"errmsg\":\"ok\"}",$result);
    }

    public function testPushMarkdownMessageAtAllUser(){
        $result =$this->ding
            ->at([],true)
            ->markdown($this->title,$this->markdown);
        $this->assertSame("{\"errcode\":0,\"errmsg\":\"ok\"}",$result);
    }
}