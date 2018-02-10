<?php

function get_style($photoswipe_options) {
  ob_start();
  ?>
  <style type='text/css'>
  .psgal {
    margin: auto;
    padding-bottom: 40px;
    -webkit-transition: all 0.4s ease;
    -moz-transition: all 0.4s ease;
    -o-transition: all 0.4s ease;
    transition: all 0.4s ease;
    <?php if(!$photoswipe_options['use_masonry']) : ?>
    opacity: 1;
    text-align: center;
    <?php endif; ?>
  }

  .psgal, .psgal * {
    box-sizing: border-box;
  }

  .psgal.photoswipe_showme{
    opacity: 1;
  }

  .psgal_wrap {
    position: relative;
    height: 100%;
    width: 100%;
  }

  .psgal_load_more {
    position: relative;
    display: block;
    margin: 0 auto;
  }

  .psgal figure {
    float: left;
    <?php if(!$photoswipe_options['use_masonry']) : ?>
    float: none;
    display: inline-block;
    <?php endif; ?>
    text-align: center;
    width: <?= $photoswipe_options['thumbnail_width'] . 'px' ?>;
    padding: 5px;
    margin: 0px;
    box-sizing: border-box;
  }

  .psgal a{
    display: inline-block;
  }

  .psgal img {
    margin: auto;
    max-width: 100%;
    width: auto;
    height: auto;
    border: 0;
  }

  .psgal figure figcaption{
    font-size: 13px;
  }

  .msnry{
    margin: auto;
  }

  .pswp__caption__center{
    text-align: center;
  }

  .hovereffect {
      width: 100%;
      height: 100%;
      float: left;
      overflow: hidden;
      position: relative;
      text-align: center;
      cursor: default;
  }

  .hovereffect .overlay {
      width: 100%;
      height: 100%;
      position: absolute;
      overflow: hidden;
      top: 0;
      left: 0;
      opacity: 0;
      background-color: rgba(0, 0, 0, 0.5);
      -webkit-transition: all .4s ease-in-out;
      transition: all .4s ease-in-out
  }

  .hovereffect img {
      display: block;
      position: relative;
      -webkit-transition: all .4s linear;
      transition: all .4s linear;
  }

  .hovereffect h2 {
      font-family: 'kingthings_wroteregular', Arial, sans-serif;
      margin-top: 20px;
      text-transform: uppercase;
      color: #fff;
      text-align: center;
      position: relative;
      font-size: 17px;
      background: rgba(0, 0, 0, 0.6);
      -webkit-transform: translatey(-100px);
      -ms-transform: translatey(-100px);
      transform: translatey(-100px);
      -webkit-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
      padding: 10px;
  }

  .hovereffect span {
      color: #fff;
  }

  .hovereffect button.info {
      text-decoration: none;
      display: inline-block;
      text-transform: uppercase;
      color: #fff;
      border: 1px solid #fff;
      background-color: transparent;
      opacity: 0;
      filter: alpha(opacity=0);
      -webkit-transition: all .2s ease-in-out;
      transition: all .2s ease-in-out;
      margin: 30px 0 0;
      padding: 7px 14px;
  }

  .hovereffect button.info:hover {
      box-shadow: 0 0 5px #fff;
  }

  .hovereffect:hover img {
      -ms-transform: scale(1.2);
      -webkit-transform: scale(1.2);
      transform: scale(1.2);
  }

  .hovereffect:hover .overlay {
      opacity: 1;
      filter: alpha(opacity=100);
  }

  .hovereffect:hover h2, .hovereffect:hover button.info {
      opacity: 1;
      filter: alpha(opacity=100);
      -ms-transform: translatey(0);
      -webkit-transform: translatey(0);
      transform: translatey(0);
  }

  .hovereffect:hover button.info {
      -webkit-transition-delay: .2s;
      transition-delay: .2s;
  }

  <?php if(!$photoswipe_options['show_captions']) : ?>
  .photoswipe-gallery-caption{
    display: none;
  }
  <?php endif; ?>
  </style>
  <?php
  return ob_get_clean();
}
