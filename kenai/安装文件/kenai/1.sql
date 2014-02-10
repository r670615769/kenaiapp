SELECT `楼层号`,GROUP_CONCAT(`单元号` ORDER BY `单元号`) as 单元号汇总,GROUP_CONCAT(`状态` ORDER BY `单元号`) as 状态汇总,
GROUP_CONCAT(`单元编号` ORDER BY `单元号`) as 单元编号汇总 FROM HOUSE GROUP BY `楼层号`";
SELECT A.单元编号 AS 房号,A.建筑面积 AS 面积,A.总价,A.功能,A.规格,A.户型 FROM CLIMB.楼盘初始_单元 A WHERE A.单元ID='1942608'
select b.楼盘id,b.名称 from climb.楼盘初始_楼盘2 b where b.DB_ID='1936667'AND b.上级楼盘id='2448146';

SELECT * FROM CLIMB.楼盘初始_单元

select one.楼层,one.房号,one.状态,two.单元ID from (select c.楼层, max(c.房号) as 房号, max(c.状态) as 状态
  from (select b.楼层,
               wm_concat(b.房号) over(partition by b.楼层 ORDER BY b.房号) as 房号,
               wm_concat(b.状态) over(partition by b.楼层 ORDER BY b.房号) as 状态
          from climb.楼盘初始_单元 b
         where b.楼阁ID = '2546261' ) c
 GROUP BY c.楼层) one , (select c.楼层, max(c.单元ID) as 单元ID
  from (select b.楼层,
               wm_concat(b.单元ID) over(partition by b.楼层 ORDER BY b.房号) as 单元ID
          from climb.楼盘初始_单元 b
         where b.楼阁ID = '2546261' ) c
 GROUP BY c.楼层) two where two.楼层=one.楼层 order by one.楼层 --2448146  2157348
 
 select one.楼层,one.房号,one.状态,two.单元ID from (select c.楼层, max(c.房号) as 房号, max(c.状态) as 状态 from (select b.楼层, wm_concat(b.房号) over(partition by b.楼层 ORDER BY b.房号) as 房号, wm_concat(b.状态) over(partition by b.楼层 ORDER BY b.房号) as 状态 from climb.楼盘初始_单元 b where b.楼阁ID = '2052457' ) c GROUP BY c.楼层) one , (select c.楼层, max(c.单元ID) as 单元ID from (select b.楼层, wm_concat(b.单元ID) over(partition by b.楼层 ORDER BY b.房号) as 单元ID from climb.楼盘初始_单元 b where b.楼阁ID = '2052457' ) c GROUP BY c.楼层) two where two.楼层=one.楼层
 select m, max(r)
2 from (select m, wm_concat(n) over (partition by m order by n) r from t)
3 group by m ;

