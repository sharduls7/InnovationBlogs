package com.innovation.blog;

import java.sql.Date;
import java.util.List;
import javax.persistence.Entity;
import javax.persistence.GeneratedValue;
import javax.persistence.Id;
import javax.persistence.Table;
import javax.persistence.Transient;

import com.fasterxml.jackson.annotation.JsonInclude;

@Entity
@Table(name = "blog")
public class Blog {

	@Id
	@GeneratedValue
	int article_id;

	String author_name;
	int author_emp_id;
	Date date;
	String article_title;
	String article_desc;
	String attachment_path;
	String tags;
	int read_time;
	int read_count;
	int likes;
	String category;
	
	@Transient
	@JsonInclude(JsonInclude.Include.NON_NULL)
	List<LatestBlog> latestBlogs;

	public List<LatestBlog> getLatestBlogs() {
	return latestBlogs;
	}

	public void setLatestBlogs(List<LatestBlog> latestBlogs) {
		this.latestBlogs = latestBlogs;
	}

	public String getCategory() {
		return category;
	}

	public void setCategory(String category) {
		this.category = category;
	}

	public int getArticle_id() {
		return article_id;
	}

	public void setArticle_id(int article_id) {
		this.article_id = article_id;
	}

	public String getAuthor_name() {
		return author_name;
	}

	public void setAuthor_name(String author_name) {
		this.author_name = author_name;
	}

	public int getAuthor_emp_id() {
		return author_emp_id;
	}

	public void setAuthor_emp_id(int author_emp_id) {
		this.author_emp_id = author_emp_id;
	}

	public Date getDate() {
		return date;
	}

	public void setDate(Date date) {
		this.date = date;
	}

	public String getArticle_title() {
		return article_title;
	}

	public void setArticle_title(String article_title) {
		this.article_title = article_title;
	}

	public String getArticle_desc() {
		return article_desc;
	}

	public void setArticle_desc(String article_desc) {
		this.article_desc = article_desc;
	}

	public String getAttachment_path() {
		return attachment_path;
	}

	public void setAttachment_path(String attachment_path) {
		this.attachment_path = attachment_path;
	}

	public String getTags() {
		return tags;
	}

	public void setTags(String tags) {
		this.tags = tags;
	}

	public int getRead_time() {
		return read_time;
	}

	public void setRead_time(int read_time) {
		this.read_time = read_time;
	}

	public int getRead_count() {
		return read_count;
	}

	public void setRead_count(int read_count) {
		this.read_count = read_count;
	}

	public int getLikes() {
		return likes;
	}

	public void setLikes(int likes) {
		this.likes = likes;
	}
	
	@Override
	public String toString() {
		return "Blog:\n ID: "+this.getArticle_id()+" | Title: "+this.getArticle_title()+" | Author Name: "+this.getAuthor_name();
	}
	
	/* Projection Interface */
	interface LatestBlog{
		
		public int getArticle_id();
		public String getAuthor_name();
		public String getArticle_title();
		public String getAttachment_path();
		public Date getDate();
	}
}
