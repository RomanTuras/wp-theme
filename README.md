# wp-theme "MyPhones"
**This is a training project**

**Realised:**
- custom theme "MyPhones"
- home page: page.php
- filter widget in right sidebar
- custom post type "Product"
- taxonomies: "manufacturer" and "reliable"
- widget "Filter"
- manufacturers and reliables terms added into widget as checkboxes
- template page "page-filter" for request results
- js redirect to page-filter with selected params
- storing and restoring checkboxes state on page filter (reset all states on home page)

**Classes:**
- class-myphones.php - main theme class
- class-myphones-filter.php - class for processing filter parameters
- class-myphones-filter-widget.php - widget class
- class-myphones-post-type.php - class for creation custom post type
- class-myphones-taxonomy.php - class for creation taxonomy

**REST API**
- added ability sending request to rest api
- json response displayed on the screen
- example ulr: http://www.wp.org/wp-json/myphones/samsung,lenovo/medium
all phones will be found where manufacturer = 'samsung' or 'lenovo', 
OR where reliable = 'medium'

**Screen of home page**

![myphones-home-page](https://user-images.githubusercontent.com/13946156/53472663-f30d6400-3a70-11e9-9eb9-2242cc23056b.png)

**Screen of filter page**

![myphones-filter-page](https://user-images.githubusercontent.com/13946156/53472686-06203400-3a71-11e9-8dc8-1b567001abc6.png)
