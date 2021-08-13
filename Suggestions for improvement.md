# Suggestions for improvement

No, we don't need the data to be cleared - what I meant by the view being recorded outside of caching is we want the single-entry templates to be cached so 
EE can use the built-in tag caching (or even better, static caching) but still track a 'view' any time it's viewed.  Ie, we don't want the views to only 
count when the cache has cleared and EE has to hit the DB again for all the entry content.  Does that make sense?  
So I guess the question is does the view count happen only when entry loads from the DB or can the view part be done by ajax outside of caching?