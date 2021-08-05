DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_BLOG`(IN `id` INT)
BEGIN

select * from blog WHERE article_id=id;

update blog
set read_count = read_count + 1
where 
article_id=id;

END$$
DELIMITER ;