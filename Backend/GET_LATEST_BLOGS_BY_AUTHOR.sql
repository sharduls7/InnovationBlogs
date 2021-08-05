DELIMITER $$
CREATE DEFINER=`root`@`localhost` PROCEDURE `GET_LATEST_BLOGS_BY_AUTHOR`(IN `id` INT(11), IN `author` VARCHAR(50))
BEGIN
DECLARE retVal int DEFAULT 0;

select COUNT(article_id) into retVal from blog
where 
article_id<>id
and author_name=author;

IF (retVal >= 3) THEN
select article_id, author_name, article_title, attachment_path, date from blog
where author_name=author
and article_id <> id
order by date desc limit 3;
ELSE
select article_id, author_name, article_title, attachment_path, date from blog
where 
article_id <> id
order by date desc limit 3;
end if;

END$$
DELIMITER ;