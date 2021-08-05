package com.innovation.blog;

import java.util.Iterator;
import java.util.List;
import java.util.Map;
import java.util.Set;
import java.util.Map.Entry;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Service;

@Service
public class BlogService {

	@Autowired
	private BlogRepository repo;
	
	public List<Blog> getBlogs(){
		
		return repo.getBlogs();
	}

	public Blog getBlog(int id) {
		
		Blog blog = repo.getBlog(id);
		if(blog != null) { 
		  blog.setLatestBlogs(repo.getLatestBlogsByAuthor(id, blog.getAuthor_name()));
		}
		
		return blog;
	}
	
	public List<Blog> getBlogByCategory(String category){
		return repo.findBlogByCategory(category);
	}
	
	public List<Blog> getBlogByTag(String tag){
		return repo.getBlogByTag("%"+tag.toUpperCase()+"%");
	}

	public int updateStats(Map<String, Object> stats, int article_id) {
		int isLiked = 0;
		//int isShared = 0;
		//float time_spent = 0;
		
		/* Currently no logic is written for storing all the stats */
		Set<Entry<String, Object>> statsEntry = stats.entrySet();
		Iterator<Entry<String, Object>> itr = statsEntry.iterator();
		while(itr.hasNext()) { 
		  Map.Entry<String, Object> entry = (Map.Entry<String, Object>)itr.next();
		  System.out.println(entry.getKey()+" "+entry.getValue());
		
		  
		  if(entry.getKey().equalsIgnoreCase("isLiked") && ((Boolean)entry.getValue())) {
			  isLiked = 1;
		  }
		  /*else if(entry.getKey().equalsIgnoreCase("isShared") && ((Boolean)entry.getValue())) {
			  isShared = 1; 
		  }
		  else if(entry.getKey().equalsIgnoreCase("time_spent")) {
			  time_spent = (Float)entry.getValue();   
		  }*/
		 
		}
		
        return repo.updateStats(article_id, isLiked);
	}
	
}
