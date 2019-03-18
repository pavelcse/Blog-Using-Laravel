
<div id="disqus_thread"></div>
<script>
    var disqus_config = function () 
    {
        this.page.url = "{{ route('post.single', ['slug' => $post->slug]) }}";
        this.page.identifier = "post-{{ $post->slug }}";
    };

    (function() {
        var d = document, s = d.createElement('script');
        s.src = 'https://backbenchers-blog.disqus.com/embed.js';
        s.setAttribute('data-timestamp', +new Date());
        (d.head || d.body).appendChild(s);
    })();
</script>