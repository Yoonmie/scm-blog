# scm_blog
- [Index](#index)
- [Post](#post)
- [Register](#admin/reg)
- [User-List](#admin/user-list)
- [User-Edit](#admin/user-edit)
- [User-Delete](#admin/user-delete)
- [Login](#admin/login)
- [Index](#admin/index)
- [Post-List](#admin/post-list)
- [Post-Search](#admin/post-search)
- [Post-Detail](#admin/post-detail)
- [Post-Edit](#home)
- [Post-delete](#home)
- [Logout](#logout)


## Steps to execute in the browser

- Copy clone link
- Add this project into the htdocs of xampp folder from terminal 
  * Window + R and write "cmd"
  * Add Clone Link into folder
    - git clone url(clone link)
    - cd folder (cd scm-blog)
- Open the project into code editor
- Import scm_blog.db into the database
  * Go to Mysql database
  * Import cloned database file into Mysql database(database location: db/scm_blog.sql)
- Run the project 

## Admin side
- Can access all User data
- Can edit and delete users
- Can access all posts
- Can edit and delete posts
- Can comment on the posts
- Can search the post title

## User side
- Can add new post
- Can edit and delete their own posts
- Can comment on the posts
- Can search the post title

## Index

All Users can access all posts and comments

## Post

All users can access each user's posts

## register

Here is a register page.Users have to choose thier roles(admin or author). Need to register the account before logging in.

## User-List

Only admin can access user-list page and admin can edit and delete users from this page.

## User-Edit

This page is for changing user data. Only admin can update the data.

## User-Delete

This page is for deleting user data. Only admin can delete the data.

## login

Here is a login page and can only login the account with registered email and account. If not u cannot log into the account and go to home page.

## Index(admin/index)

Only admin can access this page. Admin can also edit, delete and comment on each post.

## Post-List

Authors can access the page and commment on each post. They can only edit and delete their posts.

## Post-Search

Show posts when users search post titles from other pages.

## Post-Detail

Show Detail of the post when users have clicked post title from other page. Users can edit and delete their posts from this page.

## Post-Edit 

This page is for updating posts. It will redirect to Index page if the user was admin and to post-list page if the user was author.

## Post-Delete

This page is for deleting posts. It will redirect to Index page if the user was admin and to post-list page if the user was author.

## Logout

It will redirect to Login page.

