
const instagramCallback = raw => {
  
    const createLine = () => {
        const elem = document.createElement("div");
        elem.className = "contato__instagram__posts__cards__line";
        return elem;
    };

  const parent = document.getElementById("contato__instagram__posts__cards");

  // Timeline
  const timeline = raw["edge_owner_to_timeline_media"].edges;

  let lineElem = createLine();

  // Pegar timeline c/ feed.
  timeline.forEach(rawPost => {
    const post = rawPost.node;

    const thumbnail = post["thumbnail_src"];
    const imageThumb = document.createElement("img");
    imageThumb.src = thumbnail;

    if(lineElem.childElementCount < 3){
        lineElem.appendChild(imageThumb);
    } else {
        parent.appendChild(lineElem);
        lineElem = createLine();
        lineElem.appendChild(imageThumb);
    }
  });
};

(function() {
  new InstagramFeed({
    username: instagramAccount,
    display_profile: false,
    display_biography: false,
    display_gallery: true,
    callback: instagramCallback,
    styling: false,
    items: 9,
    get_data: true
  });
})();