SELECT `¥���`,GROUP_CONCAT(`��Ԫ��` ORDER BY `��Ԫ��`) as ��Ԫ�Ż���,GROUP_CONCAT(`״̬` ORDER BY `��Ԫ��`) as ״̬����,
GROUP_CONCAT(`��Ԫ���` ORDER BY `��Ԫ��`) as ��Ԫ��Ż��� FROM HOUSE GROUP BY `¥���`";
SELECT A.��Ԫ��� AS ����,A.������� AS ���,A.�ܼ�,A.����,A.���,A.���� FROM CLIMB.¥�̳�ʼ_��Ԫ A WHERE A.��ԪID='1942608'
select b.¥��id,b.���� from climb.¥�̳�ʼ_¥��2 b where b.DB_ID='1936667'AND b.�ϼ�¥��id='2448146';

SELECT * FROM CLIMB.¥�̳�ʼ_��Ԫ

select one.¥��,one.����,one.״̬,two.��ԪID from (select c.¥��, max(c.����) as ����, max(c.״̬) as ״̬
  from (select b.¥��,
               wm_concat(b.����) over(partition by b.¥�� ORDER BY b.����) as ����,
               wm_concat(b.״̬) over(partition by b.¥�� ORDER BY b.����) as ״̬
          from climb.¥�̳�ʼ_��Ԫ b
         where b.¥��ID = '2546261' ) c
 GROUP BY c.¥��) one , (select c.¥��, max(c.��ԪID) as ��ԪID
  from (select b.¥��,
               wm_concat(b.��ԪID) over(partition by b.¥�� ORDER BY b.����) as ��ԪID
          from climb.¥�̳�ʼ_��Ԫ b
         where b.¥��ID = '2546261' ) c
 GROUP BY c.¥��) two where two.¥��=one.¥�� order by one.¥�� --2448146  2157348
 
 select one.¥��,one.����,one.״̬,two.��ԪID from (select c.¥��, max(c.����) as ����, max(c.״̬) as ״̬ from (select b.¥��, wm_concat(b.����) over(partition by b.¥�� ORDER BY b.����) as ����, wm_concat(b.״̬) over(partition by b.¥�� ORDER BY b.����) as ״̬ from climb.¥�̳�ʼ_��Ԫ b where b.¥��ID = '2052457' ) c GROUP BY c.¥��) one , (select c.¥��, max(c.��ԪID) as ��ԪID from (select b.¥��, wm_concat(b.��ԪID) over(partition by b.¥�� ORDER BY b.����) as ��ԪID from climb.¥�̳�ʼ_��Ԫ b where b.¥��ID = '2052457' ) c GROUP BY c.¥��) two where two.¥��=one.¥��
 select m, max(r)
2 from (select m, wm_concat(n) over (partition by m order by n) r from t)
3 group by m ;

