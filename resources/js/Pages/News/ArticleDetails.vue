<template>
  <article class="section_margin">
    <div class="post-content">
      <div class="single-content">
        <div class="dropcap column-2">
          <p v-for="(content, index) in paragraphs.split('. ')" 
          :key="index"
          >
            {{ content }}
          </p>
        </div>
        <div class="post-tags">
          <div class="post-tags-inner">
            <a rel="tag" href="">#Love</a>
            <a rel="tag" href="">#Fashion</a>
            <a rel="tag" href="">#Lifestyle</a>
            <a rel="tag" href="">#Politic</a>
          </div>
        </div>
        <!-- <div class="post-share">
          <ul>
            <li class="facebook">
              <a href="single.html"><i class="fa fa-facebook"></i></a>
            </li>
            <li class="twitter">
              <a href="single.html"><i class="fa fa-twitter"></i></a>
            </li>
            <li class="google-plus">
              <a href="single.html"><i class="fa fa-google-plus"></i></a>
            </li>
            <li class="instagram">
              <a href="single.html"><i class="fa fa-instagram"></i></a>
            </li>
          </ul>
        </div> -->
      </div>
      <!--single content-->
    </div>
  </article>
  <CommentsPost />
</template>

<script>
import CommentsPost from "./CommentsPost.vue";
export default {
  setup() {
    const paragraphs =
      "The lemming hello and hence leapt hello more otter aerially or dear monkey much illustrative bled showed crud fox yikes but spelled far onto nudged some frog and bluebird one surreptitiously ground frenetically much far up rewrote this. And far hey much hello and bashful one save less much goldfish analogically rabbit more hello threw thanks therefore truthful unproductive strenuously concentric repaid manifestly and oh between the one jeez and hit terrier dense unwittingly shark versus inscrutably that much fit involuntary a endearingly. Knew opposite sped hey insect wow interminable telepathic far oh this to one goldfinch some under chose attractively a yet clenched one less prodigious amenably far one inset much much that hound gosh goodness articulate spitefully ape repeatedly yikes that drooled glumly some romantic lion far far wow woolly a some one meant self-consciously pangolin poorly until a dizzily morbid house. Pellentesque neque nulla cubilia enim consequat eleifend, taciti nec aenean vehicula congue dolor etiam, ornare morbi class tristique quisque mattis augue tempus semper venenatis donec ipsum cras dapibus elit, ut fusce rhoncus senectus sit lectus tristique cursus convallis. Vivamus hac faucibus primis eleifend ligula curabitur phasellus augue, quisque rhoncus purus quam per felis rhoncus viverra bibendum, habitasse sem turpis fermentum morbi ut diam elit vestibulum consectetur suscipit pellentesque commodo dictumst potenti gravida libero donec in, non tristique orci habitant ipsum diam himenaeos Ouch much until in ahead until much scallop obliquely expansive experimentally daintily more regardless wherever conjointly overslept elegant then wow extrinsically irrespective imminently and ladybug cynic hawk between a guffawed as coaxingly strictly blubbered meant much pending overheard and eagle meanly jeez untiring jeez past well far realistic on mounted a by. Jeez secure hound python slit one began indubitably much owing cackled however fabulous leapt dully across hey around due that fumed invaluably came tranquilly one jeez salamander. Against and lantern where a and gnashed nefarious far rigorous cheerfully much far owing funny lusty cantankerous dire some deliberate close condescendingly tarantula angelfish glum shut a dipped wow that jeepers much and shut discarded this. Ouch oh alas crud unnecessary invaluable some goodness opposite hello since audacious far barring and absurdly much boa until read porpoise grouped the scooped the lied save minutely gosh much this outside and much snorted dear eel resold callously flinched smoothly. Close unthinking darn as darn between naked beyond seriously guiltily chameleon and that fish lent alas spuriously winced and shuddered unlocked more some gosh darn the trustfully talkative goodness indubitably single-mindedly ouch astride. Freshly turtle took toward more much notably fearlessly resolutely tastefully thus far some hello amazingly well overthrew far youthfully where stiffly below mongoose ordered dizzy the some far cosmetically much cuddled far oh this much darn one much much cuckoo ungracefully underneath because snarling less.";

    return {paragraphs};
  },
  components: {
    CommentsPost,
  },
};
</script>

<style>
.dropcap p:first-child::first-letter {
  display: block;
  float: left;
  font-size: 5em;
  font-weight: 700;
  line-height: 1;
  margin: 5px 18px 10px 0;
}
.dropcap blockquote p:first-child::first-letter {
  display: inline;
  float: none;
  font-size: inherit;
  font-weight: inherit;
  line-height: inherit;
  margin: 0;
  padding: 0;
}
.column-2 {
  columns: 2;
  -webkit-columns: 2;
  -moz-column-count: 2;
  -webkit-column-gap: 30px; /* Chrome, Safari, Opera */
  -moz-column-gap: 30px; /* Firefox */
  column-gap: 30px;
  text-align: justify;
}
.single-content h1,
.single-content h2,
.single-content h3,
.single-content h4,
.single-content h5,
.single-content h6 {
  margin-bottom: 1rem;
}
.single-content {
  background: #fff none repeat scroll 0 0;
  font-size: 120%;
  font-weight: 500;
  padding: 20px;
  text-align: left;
}

.post-tags {
  text-align: center;
  margin: 40px 0;
}
.post-tags-inner {
  background: #eee;
  display: inline;
  padding: 2px 10px;
  margin: 0 auto;
}
.post-tags a {
  padding: 0 10px;
}
.single-comment-title::before,
.comment-reply-title::before {
  background: rgba(0, 0, 0, 0) url("../images/patern-1.png") no-repeat scroll
    right center;
  content: "";
  display: inline-block;
  height: 15px;
  margin-right: 10px;
  width: 30px;
}
.single-comment-title::after,
.comment-reply-title::after {
  background: rgba(0, 0, 0, 0) url("../images/patern-1.png") no-repeat scroll
    right center;
  content: "";
  display: inline-block;
  height: 15px;
  margin-left: 10px;
  width: 30px;
}
.single-comment-title,
.comment-reply-title {
  font-size: 1.75rem;
  position: relative;
  text-align: center;
  text-transform: uppercase;
}

.comments-title {
  text-align: center;
}
.comments-title p {
  background: #000 none repeat scroll 0 0;
  color: #fff;
  display: inline;
  padding: 0 20px;
  text-align: center;
}

ol.commentlist {
  list-style: outside none none;
  margin: 0;
  padding: 50px 50px 0;
}
ol.commentlist li {
  list-style: outside none none;
}
ol.commentlist li article {
  padding: 0 50px 20px 0;
  position: relative;
}
ol.commentlist ul {
  padding: 0 0 0 30px;
}
ol.commentlist .comment-author {
  float: left;
  margin: 0 20px 0 0;
}
ol.commentlist .comment-author img {
  border: 1px solid;
  padding: 3px;
}
ol.commentlist .reply {
  position: absolute;
  right: -20px;
  top: 20%;
}
ol.commentlist li ul article {
  padding: 0 50px 20px 0;
}
ol.commentlist li article:hover a.comment-reply-link {
  background: #000;
  color: #fff;
  transition-duration: 0.2s;
}
a#cancel-comment-reply-link {
  display: none;
}
.single-comment-title::before,
.comment-reply-title::before {
  background: rgba(0, 0, 0, 0) url("../images/patern-1.png") no-repeat scroll
    right center;
  content: "";
  display: inline-block;
  height: 15px;
  margin-right: 10px;
  width: 30px;
}
.single-comment-title::after,
.comment-reply-title::after {
  background: rgba(0, 0, 0, 0) url("../images/patern-1.png") no-repeat scroll
    right center;
  content: "";
  display: inline-block;
  height: 15px;
  margin-left: 10px;
  width: 30px;
}
.single-comment-title,
.comment-reply-title {
  font-size: 1.75rem;
  position: relative;
  text-align: center;
  text-transform: uppercase;
}
.comments-title {
  text-align: center;
}
.comments-title p {
  background: #000 none repeat scroll 0 0;
  color: #fff;
  display: inline;
  padding: 0 20px;
  text-align: center;
}

.comment-navigation {
  text-align: right;
}
.comment-respond {
  padding-top: 30px;
}

.comment-form textarea,
.comment-form input {
  border: 1px solid #000;
  color: #000;
  font-size: 14px;
  margin: 0 0 20px;
}
.comment-form textarea {
  min-height: 150px;
}
.comment-form input.submit {
  background: #000 none repeat scroll 0 0;
  border: medium none;
  color: #fff;
  height: 50px;
  line-height: 1;
  padding: 10px 25px;
  text-transform: uppercase;
}

.comment-notes {
  margin-bottom: 30px;
  text-align: center;
}
</style>