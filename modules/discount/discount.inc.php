<?php
/**
 * @author Tissot.Cai(Email:Tissot.Cai@gmail.com,QQ:1213690001)
 * @copyright Tissot.Cai
 * @version 1.0
 */

/**
 * Description of discount
 *
 * @author TissotCai
 */
require_once 'discount.class.php';
class DiscountModule {

	/**
	 * 获取折扣列表
	 * @param $param
	 *		array(
	 *			'page' => '页码',
	 *			'where' => 'array(shop=>沃尔玛,...)',
	 *			'epage' => '每页记录数'
	 *		)
	 * @return
	 *	array(
	 *		'list' => array(折扣信息信息),
	 *		'record_num' => 记录数,
	 *		'page' => 页码,
	 *		'page_size' => 每页记录数
	 *		'total_page' => 总页码
	 * )
	 */
	public static function Get ($param) {

		$p = isset($param['page'])?(int)$param['page']:1;
		$page_size = isset($param['epage'])?(int)$param['epage']:1;
		$where = isset($param['where'])?$param['where']:array();
		
		return Discount::ListDiscount($where, $p, $page_size);
	}
}
?>
