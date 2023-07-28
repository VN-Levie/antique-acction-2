<template>
  <div class="single-comment">
    <section id="comments">
      <h4 class="single-comment-title">Comments</h4>
      <div class="comments-inner">
        <ol class="commentlist">
          <li>
            <article class="comment">
              <div class="comment-author">
                <img width="60" height="60" src="" alt="" />
              </div>
              <div class="">
                <header class="comment-meta">
                  <strong class="fn"> Steven Jobs </strong>
                  <span class="comment-date">July 4, 2017 7:25 am </span>
                </header>
                <div class="comment-content entry">
                  <p>
                    jeepers unscrupulous anteater attentive noiseless put less
                    greyhound prior stiff ferret unbearably cracked oh.
                  </p>
                </div>
              </div>
            </article>
          </li>
        </ol>
        <div class="comment-respond">
          <h3 class="comment-reply-title">Leave a Reply</h3>
          <form class="comment-form">
            <p class="comment-notes">
              <span>Your email address will not be published.</span>
            </p>
            <div class="row">
              <div class="col-sm-12 col-md-6">
                <label for="">Name (optional)</label>
                <input
                  type="text"
                  size="30"
                  value=""
                  placeholder="Your name *"
                  name="author"
                />
              </div>
              <div class="comment-form-email col-sm-12 col-md-6">
                <label for="">Email (optional)</label>
                <input
                  type="email"
                  size="30"
                  value=""
                  placeholder="Email *"
                  name="email"
                  id="email"
                />
              </div>
            </div>
            <p class="Comment_from">
              <textarea
                aria-required="true"
                placeholder="Your Comment"
                rows="5"
                cols="88"
                name="comment"
              ></textarea>
            </p>

            <p class="form-submit">
              <input
                type="submit"
                value="Post Comment"
                class="submit"
                name="submit"
              />
              <input type="hidden" value="80" />
              <input type="hidden" value="0" />
            </p>
          </form>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  setup() {
    return {};
  },
};
</script>

<style>
.comment-respond {
  padding-top: 30px;
}
.comment-reply-title::before {
  /* background: rgba(0, 0, 0, 0) url("../images/patern-1.png") no-repeat scroll right center; */
  content: "";
  display: inline-block;
  height: 15px;
  margin-right: 10px;
  width: 30px;
}
.single-comment-title::after,
.comment-reply-title::after {
  /* background: rgba(0, 0, 0, 0) url("") no-repeat scroll right center; */
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