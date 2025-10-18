document.addEventListener("DOMContentLoaded", () => {
  const ratings = {
    5: 58,
    4: 23,
    3: 9,
    2: 6,
    1: 4,
  };

  const totalRatings = Object.values(ratings).reduce((a, b) => a + b, 0);
  const average =
    totalRatings > 0
      ? (
          Object.entries(ratings).reduce(
            (sum, [stars, count]) => sum + stars * count,
            0
          ) / totalRatings
        ).toFixed(1)
      : 0;

  const averageEl = document.getElementById("average");
  if (averageEl) averageEl.textContent = average;

  const starsEl = document.querySelector(".stars");
  if (starsEl) {
    const porcentaje = (average / 5) * 100;
    starsEl.style.setProperty("--rating-percent", `${porcentaje}%`);
  }

  const barsContainer = document.getElementById("rating-bars");
  if (barsContainer) {
    barsContainer.innerHTML = "";

    for (let i = 5; i >= 1; i--) {
      const count = ratings[i] || 0;
      const percent = totalRatings ? (count / totalRatings) * 100 : 0;

      const bar = document.createElement("div");
      bar.classList.add("rating-bar");
      bar.innerHTML = `
        <span class="star-span">${i} ★</span>
        <div class="bar"><div class="fill" style="width:${percent}%;"></div></div>
        `;
      barsContainer.appendChild(bar);
    }
  }
});