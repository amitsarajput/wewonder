var app=new Vue({
    el:'#blogsApp',
    data:{
        allBlogPosts:'',
    },
    methods:{
        fetchAllBlogs: async function(){
            await axios.post('../../blog-inc/blog-crud.php',{
                action:'fetchallblogs'
            }).then(response=>{
                app.allBlogPosts=response.data;
            });
        }
    },
    created:function(){
        this.fetchAllBlogs();
        console.log(this.allBlogPosts);
    }
});