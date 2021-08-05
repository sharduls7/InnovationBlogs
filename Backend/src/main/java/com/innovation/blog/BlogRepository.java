package com.innovation.blog;

import java.util.List;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.data.jpa.repository.Modifying;
import org.springframework.data.jpa.repository.Query;
import org.springframework.data.repository.query.Param;
import org.springframework.stereotype.Repository;
import org.springframework.transaction.annotation.Transactional;

@Transactional
@Repository
public interface BlogRepository extends JpaRepository<Blog, Integer>{

	@Query("From Blog ORDER BY date DESC")
	List<Blog> getBlogs();
	
	@Query(nativeQuery = true,value = "call GET_BLOG(:id)")   
    Blog getBlog(@Param("id")int id);

	@Query(nativeQuery = true,value = "call GET_LATEST_BLOGS_BY_AUTHOR(:id, :author)")   
    List<Blog.LatestBlog> getLatestBlogsByAuthor(@Param("id")int id, @Param("author")String author);
	
	List<Blog> findBlogByCategory(String category);
	
	@Query("From Blog where upper(tags) like :tag")
	List<Blog> getBlogByTag(@Param("tag")String tag);

	@Modifying
	@Query("update Blog set likes=likes + :isLiked where article_id = :id") 
	int updateStats(@Param("id")int article_id, @Param("isLiked") int isLiked);

}
