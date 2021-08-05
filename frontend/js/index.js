let current_page = 1;  
  
let tag = getParameterByName('tag');
if(tag == null || tag == undefined)
{
  window.blogs = JSON.parse(sessionStorage.getItem('blogs')); 
  if( blogs == null || blogs == undefined ){  
    callWs();
  }
  else{
    createSummaryPage();
    //getting some sort of 404 error in console
  }
}
else
{
    callByTag(tag.trim());
}

function callByTag(tag){
  fetch('http://localhost:8080/blogs/tag/'+tag)
  .then(handleErrors)
  .then((res) => res.json())
  .then((data) => {
      window.blogs = data;
      if(blogs == null || blogs.length==0){
        // add code for that
        console.log('Nothing to show!');
      } 
      createSummaryPage(); 
    });
}

function callByCategory(category){
  fetch('http://localhost:8080/blogs/category/'+category)
  .then((res) => res.json())
  .then((data) => {
      window.blogs = data;
      createSummaryPage();
      document.getElementById('summaryDiv').scrollIntoView({behavior: "smooth"});
  });   
}

function callWs(){
  fetch('http://localhost:8080/blogs/')
  .then(handleErrors)
  .then((res) => res.json())
  .then((data) => {
      window.blogs = data;  
      if(blogs == null || blogs.length==0){
        // add code for that
        console.log('Nothing to show!');
      } 
      sessionStorage.setItem('blogs',JSON.stringify(blogs));    
      createSummaryPage();    
  });  
}

function handleErrors(response) {
  if (response.status != 200) {
      // code for that
      console.log('Something went wrong', response.status);
  }
  return response;
}

function createSummaryPage(){
      let pagination_data=pagination(blogs, current_page);
      let trimmedBlogData = pagination_data.trimmedData;
      let sumPage='';
      for(let i=0;i<trimmedBlogData.length;i++)
      {
        sumPage += createBlogSummary(i, trimmedBlogData);  
      }
      document.getElementById('summaryDiv').innerHTML = sumPage;
      pageButtons(pagination_data.pages);
}

function pagination(blogs, current_page){
  let limit = 2; 
  let trimStart = limit * (current_page - 1);
  let trimEnd = trimStart + limit;

  let trimmedData = blogs.slice(trimStart, trimEnd);
  let pages = Math.ceil(blogs.length/limit);

  return {
    "trimmedData":trimmedData,
    "pages":pages,
  };
}

function pageButtons(pages){
  let page_wrapper = document.getElementById('pagination-wrapper');
  page_wrapper.innerHTML='';

  let maxPageButtons = 2;
  let maxLeft = current_page - Math.floor(maxPageButtons/2);
  let maxRight = current_page + Math.floor(maxPageButtons/2);

  if(maxLeft < 1)
  {
    maxLeft = 1;
    maxRight = maxPageButtons
  }

  if(maxRight > pages){
    maxRight = pages;      
    maxLeft = pages - (maxPageButtons - 1);

    if(maxLeft < 1)
      maxLeft = 1; 
  }
  
  for(let page=maxLeft; page<=maxRight; page++){

    if(page == current_page)
      page_wrapper.innerHTML += `<li class="page-item active" id="page${page}"><a class="page-link" style="font-size: 1.5em" href="javascript:changePage('${page}')">${page}</a></li>`;
    else
      page_wrapper.innerHTML += `<li class="page-item" id="page${page}"><a class="page-link" style="font-size: 1.5em" href="javascript:changePage('${page}')">${page}</a></li>`;
  }

  if(current_page != 1){
      page_wrapper.innerHTML = `<li class="page-item">
      <a class="page-link" style="font-size: 1.5em" href="javascript:changePage('1')"> 
            &laquo; First</a>
          </li>` + page_wrapper.innerHTML; 
  }
  
  if(current_page != pages){
      page_wrapper.innerHTML = page_wrapper.innerHTML + `<li class="page-item">
      <a class="page-link" style="font-size: 1.5em" href="javascript:changePage('${pages}')"> 
              Last &raquo;</a>
          </li>`; 
  }
}

function changePage(page){
  document.getElementById('summaryDiv').innerHTML=''; 
  current_page = page; //why does it work as we're not making changes in global scope, then global scope value should be retained in next fun call
  createSummaryPage();
}

function createBlogSummary(i, trimmedBlogData){
  let article_class = new Array('article-full-width','article-full-width article-right'); 
  let summary = `<div class="col-12 mb-100">
      <article data-file="articles/b.html" data-target="article" class="${article_class[i%2]}">
        <div class="post-image">
          <img class="img-fluid" src="${trimmedBlogData[i].attachment_path}" alt="post-thumb">
        </div>
        <div class="post-content">
          <ul class="list-inline d-flex justify-content-between border-bottom post-meta pb-2 mb-4">
            <li class="list-inline-item"><i class="ti-calendar mr-2"></i>${trimmedBlogData[i].date}</li>
            <li class="list-inline-item"><i class="ti-alarm-clock mr-2"></i><span class="eta">${trimmedBlogData[i].read_time} mins</span> read</li>
          </ul>
          <h4 class="mb-4"><a href="blog-single.html?index=${trimmedBlogData[i].article_id}" class="text-dark">${trimmedBlogData[i].article_title}</a></h4>
          <p class="mb-0 post-summary" id="summary">${trimmedBlogData[i].article_desc}</p> 
          <a class="btn btn-transparent mb-4" href="blog-single.html?index=${trimmedBlogData[i].article_id}"}>Continue...</a>
        </div>
      </article>
    </div>`;

    return summary;
}

function getParameterByName(name, url = window.location.href) {
  name = name.replace(/[\[\]]/g, '\\$&');
  var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
      results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}  

/* 
Implement sort by likes, reads, latest, oldest, read-time
select list  icon
*/
function sortBlogs(){
  let sort_element = document.querySelector('#sort');
  
  if( sort_element.className == 'fas fa-sort-up' ){
    sort_element.className='fas fa-sort-down';
    sortDown();
  }
  else{
    sort_element.className='fas fa-sort-up';
    sortUp();
  }
  createSummaryPage();
}

function sortUp(){
  blogs.sort((a, b) => {
    return parseInt(a.read_count) - parseInt(b.read_count);
  });
 
}

function sortDown(){
  blogs.sort((a, b) => {
    return parseInt(b.read_count) - parseInt(a.read_count);
  });
}

// filter by author name , category, tags 
function filterBlogs(){
  console.log("Here it comes");
}
