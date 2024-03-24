# HTML and CSS Classes

## HTML

- second header in an article tag inside the main tag
  - the H1 inside the header isn't a link and not apart of the navigation menu. -> (content-page.php[line14])
  - Commented out the header and footer -> (content-page.php[line 14 - 17 && line 34 - 54])

- Inside the location section, the p tags and a tag are nested in the h3 ->(front-page.php[line77 - 92])

- section nested inside an H2
  ->(front-page.php[line])

## CSS

#### Main

  .vlx__main

#### Footer

  .vlx__footer
  .vlx__footer__section
  <!-- left Nav -->
  .vlx__footer--navLeft
    .vlx__footer--navLeft/menu-social-media-menu-container
      .vlx__footer--navLeft/menu-social-media-menu-container(div)/menu-social-media-menu(ul)
        .vlx__footer--navLeft/menu-social-media-menu-container(div)/menu-social-media-menu(ul)/menu-item(li)
  <!-- right Nav -->
  .vlx__footer--navRight
        .vlx__footer--navRight/menu-social-media-menu-container
      .vlx__footer--navRight/menu-social-media-menu-container(div)/menu-social-media-menu(ul)
        .vlx__footer--navRight/menu-social-media-menu-container(div)/menu-social-media-menu(ul)/menu-item(li)

### HOME PAGES CLASSES

#### Home Page Banner

 .vlx__home__banner
 .vlx__home__banner--image/img
 .content-entry/
   .content-entry/p -> p tag in the banner
   .content-entry/wp-block-button/wp-block-button/wp-block-block__link

#### Home About Section

 .vlx__home__about
 .vlx__home__about__article
 .vlx__home__about/img
 .vlx__home__about/attachment-large
 .vlx__home__about_p/??
  .vlx__home__about_p/a

#### Home Location Section

  .vlx__home__locations
  .vlx__home__locations--title
  .vlx_home__locations--location
    .vlx_home__locations--location img
    .vlx_home__locations--name
    .vlx_home__locations--address
    .vlx_home__locations--phone
    .vlx_home__locations--email

#### Home Testimonial Section

##### Instgram

  .vlx__home__testimonials
  .vlx__home__testimonials--title
  .vlx__home__testimonials--instagramFeed
  .vlx__home__testimonials--IGTitle

##### Review

  .vlx__home__testimonials--reviews
  .vlx__home__testimonials--reviewsTitle
  .vlx__home__testimonials--review
    .vlx__home__testimonials--review/img
  .vlx__home_testimonials--reviewTitle
  .vlx__home_testimonials--reviewContent
  .vlx__home_testimonials--reviewRating

### MENU PAGE CLASSESS

#### Menu carousel

  .vlx__menu--carousel

#### Menu Tab Section

  .vlx__menu--tabs
    .lvx__menu__tabs--list
    .lvx__menu__tabs--item
    .lvx__menu__tabs--link

#### Menu allergen Section

  .vlx__menu--allergen
  .vlx__menu__allergen--title
  .vlx__menu__allergen--container
  .vlx_meu__allergen--text

#### Menu Category Section

  .vlx__menu__category
  .vlx__menu__category--title
  .vlx__menu__category__item--tex
  .vlx__menu__category__item--allergen

### ABOUT PAGE CLASSESS

#### About Chef Section

  .vlx__about__chef
  .vlx__about__chef--title

#### About Team section

  .vlx__about__team
  .vlx__about__team--title
  <!-- tabs -->
  .vlx__about__team--tabs
  .vlx__about__team__tabs--list
  .vlx__about__team__list--item
  .vlx__about__team__item__link
  <!-- content -->
  .vlx__about__team--content
  .vlx__about__team__content--locationTitle
  .vlx__about__team__content/img
  .vlx__about__team__content--name
  .vlx__about__team__content--text

### CONTACT PAGE CLASSES

#### Contact Section

  .vlx__contact--location
  .vlx__contact__location--locationTitle
  .vlx__contact__location--map
  .vlx__contact__location--address
  .vlx__contact__location__hours--list
  .vlx__contact__location__hours--item
  .vlx__contact__location__contactInfo
    .vlx__contact__location__contactInfo--email
    .vlx__contact__location__contactInfo--phone

### COMMUNITY PAGE CLASSESS

#### Community section

  .vlx__community
  .vlx__community--title

##### Event Post

  .vlx__community--event
  .vlx__comunity__event--title
  <!-- p, ul, li can't be access from the page-community.php template - select elements -->
  .vlx__community__event/p
  .vlx__community__event/ul
    .vlx__community__event/ul li

### CAREER PAGE CLASSES

#### Job Post Section

##### Job Post message section

  .vlx__career__jobPost
  .vlx__career__jobPost--header
  .vlx__career__jobPost__header--title
  <!-- empty p tag -->
  .vlx__career__jobPost__header--text

##### Job Post Listing Section

  .vlx__career__jobPost--listing
  .vlx__career__jobPost--post
  .vlx__career__jobPost__post--header
  .vlx__career__jobPost__post--title
  .vlx__career__jobPost__post--location
  .vlx__career__jobPost__post--description
  .vlx__career__jobPost__post__decription/p
  .vlx__career__jobPost__post__decription/ul/li
  .vlx__career__jobPost__post--footer
  .vlx__career__jobPost__post--viewMore

#### Job Post Application Section

  .vlx__career__application
  .vlx__career__application--title

#### Job Apply section

  .vlx__career--apply
  .vlx__career__apply--title
  .vlx__career__apply--text
