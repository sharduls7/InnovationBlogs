package com.innovation.blog;

import java.util.List;
import java.util.Map;
import org.slf4j.Logger;
import org.slf4j.LoggerFactory;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.CrossOrigin;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PutMapping;
import org.springframework.web.bind.annotation.RequestBody;
import org.springframework.web.bind.annotation.RequestMapping;
import org.springframework.web.bind.annotation.RequestMethod;
import org.springframework.web.bind.annotation.RestController;
import org.springframework.web.server.ResponseStatusException;

@RestController
@CrossOrigin(value="http://127.0.0.1:5500")
@RequestMapping(path="/blogs", method={RequestMethod.GET})
public class BlogController {

	private static final Logger logger = LoggerFactory.getLogger(BlogController.class);
	
	@Autowired
	private BlogService service;

	@GetMapping(path="/", produces="application/json")
	public List<Blog> getBlogs(){
		return service.getBlogs();
	}
	
	@GetMapping(path="/{id}", produces="application/json")
	public Blog getBlog(@PathVariable("id")int id) {
		Blog blog = service.getBlog(id);
		
		if(blog == null) {
			 logger.error("Blog with ID: "+id+" not found in the database");
			 throw new ResponseStatusException(HttpStatus.NOT_FOUND, "Blog with ID<"+id+"> not found"); 
		}
			
		return blog;
	}
	
	@GetMapping(path="/category/{category}", produces="application/json")
	public List<Blog> getBlogByCategory(@PathVariable("category")String category) {
		return service.getBlogByCategory(category);
	}
	
	@GetMapping(path="/tag/{tag}", produces="application/json")
	public List<Blog> getBlogByTag(@PathVariable("tag")String tag) {
		return service.getBlogByTag(tag);
	}
	
	@PutMapping(path="/stats/{id}", produces="application/json")
	public ResponseEntity<Object> updateStats(@RequestBody Map<String, Object> stats, @PathVariable("id") int id) {
		int rowsUpdated = service.updateStats(stats, id);
		
		if(rowsUpdated == 0) {
			logger.error("Could not update blog with ID: "+id+" as this ID is not present in database");
			throw new ResponseStatusException(HttpStatus.NOT_FOUND, "Could not update blog with ID: "+id+" as this ID is not present in database");
		} else if(rowsUpdated > 1) {
			logger.error("Could not update blog with ID: "+id+", possible duplicates are present in database");
			throw new ResponseStatusException(HttpStatus.INTERNAL_SERVER_ERROR, "Could not update blog with ID: "+id+", possible duplicates are present in database");
		} else {
			logger.info("Statistics updated successfully into table for ID: "+id+"");
		}
		
		return new ResponseEntity<Object>(HttpStatus.NO_CONTENT);
	}
	
	/*
	 * @PostMapping(path="/", produces="application/json") 
	 * public Blog createBlog()
	 * { return null; }
	 */
}
