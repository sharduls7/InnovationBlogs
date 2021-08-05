let article_id = getParameterByName('index');
let likedArticles;
let current_time = new Date();

if(!isNaN(article_id))
{
  getBlogData(); 
  likedArticles = JSON.parse(localStorage.getItem('Liked'));
  if(checkIfLikedBefore()){
    document.querySelector('.far.fa-heart').className = 'fas fa-heart';
  }
}
else
{
  article_id = "INVALID";
  // redirect to error page
}


function getBlogData(){
  fetch('http://localhost:8080/blogs/'+article_id)
  .then((res) => res.json())
  .then((data) => {
      createBlog(data);
      populateLatestPost(data);
  });  
}

function createBlog(theBlog){
  const months = ["Jan", "Feb", "March","April", "May", "June", "July", "Aug", "Sep", "Oct", "Nov", "Dec"];
  let currentDate = new Date(theBlog.date);
  let formattedDate = months[currentDate.getMonth()] + " " + currentDate.getDate() + ", "  + currentDate.getFullYear();

  document.getElementById('img').src = theBlog.attachment_path;
  document.getElementById('para1').innerHTML = theBlog.article_desc;
  document.getElementById('pg_title').innerHTML = theBlog.article_title;
  document.getElementById('author').innerHTML = ' <b style="font-size: 1.2em">'+theBlog.author_name+' </b>';
  document.getElementById('date').innerHTML = ' <b style="font-size: 1.2em">'+formattedDate+' </b>';
  
  let tagsRef= document.getElementById('tags');
  let tagslist='';
  let tagArr = theBlog.tags.split(",");
  
  for(let i=0; i<tagArr.length; i++){
    tagslist += `<li class="list-inline-item m-1"><a href="index.html?tag=${tagArr[i]}">${tagArr[i]}</a></li>`;
  }
  tagsRef.innerHTML = tagslist;
}

function populateLatestPost(theBlog){
  
  let postdiv = document.getElementById('latestposts');
  const months = ["JAN", "FEB", "MAR","APR", "MAY", "JUNE", "JULY", "AUG", "SEP", "OCT", "NOV", "DEC"];
  let latestArticle='';
  console.log("Here :" +theBlog.latestBlogs[0].author_name);
  for(let i=0 ; i< theBlog.latestBlogs.length ; i++){
      
      let currentDate = new Date(theBlog.latestBlogs[i].date);
      let formattedDate = months[currentDate.getMonth()] + " " + currentDate.getDate() + ", "  + currentDate.getFullYear();

      latestArticle += `<div class="media mb-4">
              <div class="post-thumb-sm mr-3">
                <img class="img-fluid" src="${theBlog.latestBlogs[i].attachment_path}" alt="post-thumb">
              </div>
              <div class="media-body">
                <h6><a class="text-dark" href="blog-single.html?index=${theBlog.latestBlogs[i].article_id}">${theBlog.latestBlogs[i].article_title}</a></h6>
                <ul class="list-inline d-flex justify-content-between mb-2">
                  <li class="list-inline-item">${theBlog.latestBlogs[i].author_name}</li>
                  <li class="list-inline-item" style="text-align: right">${formattedDate}</li>
                </ul>
              </div>
            </div>`;
  }
  postdiv.innerHTML = latestArticle;
}

function getParameterByName(name, url = window.location.href) {
  name = name.replace(/[\[\]]/g, '\\$&');
  var regex = new RegExp('[?&]' + name + '(=([^&#]*)|&|#|$)'),
      results = regex.exec(url);
  if (!results) return null;
  if (!results[2]) return '';
  return decodeURIComponent(results[2].replace(/\+/g, ' '));
}

function toggleTheme(){
  //store this into localstorage as well
  const theme = document.querySelector('#theme');
  if(theme.className == 'far fa-lightbulb'){
    theme.className = 'fas fa-lightbulb';    
    document.querySelector('body').className='dark-mode';
    
    let footer = document.querySelector('footer');
    console.log('footer is', footer);
    footer.classList.add('darkMode');
    
    let mb4= document.querySelectorAll('h6.mb-4'); 
    for(let i in mb4){
      if(mb4[i] != undefined)
       { mb4[i].style.color = '#fff';}
    }
    /*let titles = document.querySelectorAll('.media-body h6 a.text-dark');
    for(let j in titles){
      titles[j].style.color = '#fff';
    }*/

    
  }
  else{
    theme.className = 'far fa-lightbulb';
    document.querySelector('body').className='';
    let mb4= document.querySelectorAll('h6.mb-4');
    for(let i in mb4){
      mb4[i].style.color = '';
    }
  }
}

function checkIfLikedBefore(){
  if(likedArticles != null || likedArticles != undefined)
  { 
    for(let id in likedArticles){
      if(parseInt(likedArticles[id],10) === parseInt(article_id,10))
          return true;
    }
  }
  return false;
}

function likeBlog(){
  document.querySelector('.far.fa-heart').className = 'fas fa-heart';
  
  if(likedArticles != null || likedArticles != undefined){
    likedArticles.push(article_id);
    localStorage.setItem('Liked', JSON.stringify(likedArticles));
  }
  else{
    localStorage.setItem('Liked', JSON.stringify(new Array(article_id)));
  }
  updateStats(true, false);
}

function shareBlog(){
  let body = "Hello,\n\rHere's the link to the article: "+window.location.href+" \n\rThank you";
  body = encodeURIComponent(body);
  window.location = "mailto:?subject=Check out this amazing blog&body="+body;

  //updateStats(false, true);
}

function updateStats(isLiked, isShared){
  
  let time_spent = Math.abs(new Date() - current_time);  
  time_spent = (time_spent/1000); /* In Seconds */

  fetch("http://localhost:8080/blogs/stats/"+article_id+"", {

    method: "PUT",
      
    body: JSON.stringify({
      "isLiked": isLiked,
      "isShared": isShared,
      "time_spent": time_spent
    }),
      
    headers: {
        "Content-type": "application/json; charset=UTF-8"
    }
  })
  .then(response => response.json())

}