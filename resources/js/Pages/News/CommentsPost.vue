<template>
  <div class="single-comment">
    <section id="comments">
      <h4 class="single-comment-title">Comments</h4>
      <div class="comments-inner">
        <div class="comments-title">
          <p>There are 3 comments for this article</p>
        </div>
        <ol class="commentlist">
          <li>
            <article class="comment">
              <div class="comment-author">
                <img
                  width="60"
                  height="60"
                  src="post-author-avatar.jpg"
                  alt=""
                />
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
                <div class="reply">
                  <a
                    aria-label="Reply to spadmin"
                    href="single.html#respond"
                    class="comment-reply-link"
                    rel="nofollow"
                    >Reply</a
                  >
                </div>
              </div>
            </article>
          </li>
        </ol>
        <!--comment list-->
        <nav role="navigation" class="comment-navigation">
          <div class="col col-1"></div>
          <div class="col">
            <a href="#">Newer Comments →</a>
          </div>
        </nav>
        <!--comment nav-->
        <div class="comment-respond">
          <h3 class="comment-reply-title">
            Leave a Reply
            <small
              ><a href="" rel="nofollow"><i class="fa fa-times"></i></a
            ></small>
          </h3>
          <form class="comment-form">
            <p class="comment-notes">
              <span>Your email address will not be published.</span>
            </p>
            <div class="row">
              <div class="comment-form-author col-sm-12 col-md-6">
                <label for="author">Name (optional)</label>
                <input
                  type="text"
                  size="30"
                  value=""
                  placeholder="Your name *"
                  name="author"
                  id="author"
                />
              </div>
              <div class="comment-form-email col-sm-12 col-md-6">
                <label for="email">Email (optional)</label>
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
            <p class="comment-form-comment">
              <label for="comment">Comment</label
              ><textarea
                aria-required="true"
                placeholder="Your Comment"
                rows="8"
                cols="45"
                name="comment"
                id="comment"
              ></textarea>
            </p>

            <p class="form-submit">
              <input
                type="submit"
                value="Post Comment"
                class="submit"
                id="submit"
                name="submit"
              />
              <input
                type="hidden"
                id="comment_post_ID"
                value="80"
                name="comment_post_ID"
              />
              <input
                type="hidden"
                value="0"
                id="comment_parent"
                name="comment_parent"
              />
            </p>
          </form>
        </div>
        <!--comment form-->
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

<style lang="scss" scoped>
</style>