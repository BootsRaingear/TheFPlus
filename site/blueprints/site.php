<?php if(!defined('KIRBY')) exit ?>

title: Site
pages: 
  template:
    - default
    - listing
    - people
    - results
    - blogs
    - page_withbonus
    - stats
fields:
  title:
    label: Title
    type:  text
  email:
    label: Site Admin Email
    type: email
    required: true
    width: 1/2
  twitter_handle:
    label: Twitter Handle (no @)
    type: text
    placeholder: (no @)
    icon: twitter
    width: 1/2
    required: true
  description:
    label: Description
    type:  textarea
  copyright:
    label: Copyright
    type:  text
  