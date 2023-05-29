<?php

namespace WeimobAbility\Weimob\Xinyun\Cloud\Msg\Wangpu;

use WeimobAbility\Weimob\Cloud\Msg\Common\WeimobXinyunMessage;
use WeimobAbility\Weimob\Cloud\Msg\Common\WeimobMessageAck;

/**
 * @id 1,267
 * @author weimobcloud
 * @create 2023-5-29
 */
interface WPReturnOrderStatusChangeListener
{
    const topic = 'WP_returnOrder';
    const event = 'statusChange';
    const classType = StatusChangeMessage::class;
    const specType = 'xinyun';

    public function onMessage(WeimobXinyunMessage $message) : WeimobMessageAck;
}

class StatusChangeMessage implements \JsonSerializable
{
    /**
     * 订单编号
     * @var string
     */
    private $order_no;

    /**
     * 维权单编号
     * @var string
     */
    private $return_order_no;

    /**
     * @param string $order_no
     */
    public function setOrderNo(?string $order_no): void
    {
        $this->order_no = $order_no;
    }

    /**
     * @return string
     */
    public function getOrderNo(): ?string
    {
        return $this->order_no;
    }

    /**
     * @param string $return_order_no
     */
    public function setReturnOrderNo(?string $return_order_no): void
    {
        $this->return_order_no = $return_order_no;
    }

    /**
     * @return string
     */
    public function getReturnOrderNo(): ?string
    {
        return $this->return_order_no;
    }


    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}

