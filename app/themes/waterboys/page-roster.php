<?php get_header(); ?>
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <!-- <div id="player-slider" data-slick='{"slidesToShow": 4, "slidesToScroll": 4}'>
      <div><h3>1</h3></div>
      <div><h3>2</h3></div>
      <div><h3>3</h3></div>
      <div><h3>4</h3></div>
      <div><h3>5</h3></div>
      <div><h3>6</h3></div>
    </div> -->
    <div class="placehold"></div>
    <div class="rs__ctn">
      <h2 class="rs__title">The Roster<br><img class="st__title-wave" src="<?php echo get_stylesheet_directory_uri() ?>/assets/roster__blue-wave.png" alt=""></h2>
      <div class="table-ctn">
        <table border="0" id="roster" class="tablesorter roster">
          <thead>
            <tr>
              <th><a href="#">Waterboys</a></th>
              <th><a href="#">Team</a></th>
              <th><a href="#">Fundraising Rank</a></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>Smith</td>
              <td>John</td>
              <td>1st</td>
            </tr>
            <tr>
              <td>Bach</td>
              <td>Frank</td>
              <td>2ND</td>
            </tr>
            <tr>
              <td>Doe</td>
              <td>Jason</td>
              <td>3rd</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
            <tr>
              <td>Conway</td>
              <td>Tim</td>
              <td>4th</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="rs__honor-bg">
      <div class="rs__ctn rs__honor-copy">
        <h3>Honorary Waterboys</h3>
        <p>Our honorary Waterboys work in — and play on— other fields, but demonstrate the same passion and dedication to.</p>
      </div>
      <div class="rs__ctn">
        <div class="rs__honor-ctn">
          <div class="rs__honor-item">
            <div class="rs__honor-image-1"></div>
            <div class="rs__honor-info-ctn">
              <div class="rs__honor-name-ctn">
                <h2 class="rs__honor-name-copy">Nate Boyer</h2>
                <p class="rs__honor-team-copy">TEAM NAME</p>
              </div>

              <div class="rs__raised-ctn">
                <h3 class="wb__red-sm-title">Total Raised</h3>
                <p>
                  $27,000
                </p>
                <a href="/" class="wb__button-blue">View Profile</a>
              </div>
            </div>
          </div>

          <div class="rs__honor-item">
            <div class="rs__honor-image-2"></div>
            <div class="rs__honor-info-ctn">
              <div class="rs__honor-name-ctn">
                <h2 class="rs__honor-name-copy">Yadier Molina</h2>
                <p class="rs__honor-team-copy">TEAM NAME</p>
              </div>
              <div class="rs__raised-ctn">
                <h3 class="wb__red-sm-title">Total Raised</h3>
                <p>
                  $27,000
                </p>
                <a href="/" class="wb__button-blue">View Profile</a>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    </div>
    <div class="wb__mission-socialbar-ctn rs__space">
      <div class="socialbar-buttons-ctn">
        <a href="" class="socialbar-button">Meet Our Special Teams</a>
      </div>
    </div>
    <?php endwhile; ?>
      <?php endif ?>
        <?php get_footer(); ?>
