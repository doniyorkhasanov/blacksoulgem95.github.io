<script type="application/ld+json">
    {
   "@context":"https://schema.org",
   "@type":"Article",
   "headline":"{{$article->title}}",
   "image":"{{$article->cover_image}}",
   "author":"{{$article->author}}",
   "keywords":"{{implode(' ', $article->tags)}}",
   "publisher":{
      "@type":"Person",
      "name":"{{$article->author}}"
   },
   "url":"{{$article->getUrl()}}",
   "datePublished":"{{date('Y-m-d', $article->date)}}",
   "dateCreated":"{{date('Y-m-d', $article->date)}}",
   "dateModified":"{{date('Y-m-d', $article->date)}}",
   "description":"{{$article->description}}",
   "articleBody":"{{$article->excerpt}}"
}

</script>