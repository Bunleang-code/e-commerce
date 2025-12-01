<template>
  <div class="hero">
    <div class="hero-container">
      <div class="hero-content">
        <h1>Don't miss amazing<br>grocery deals</h1>
        <p>Sign up for the daily newsletter</p>
        <div class="newsletter-form">
          <input type="email" placeholder="Your email address" />
          <button>Subscribe</button>
        </div>
      </div>
      <div class="hero-image">
        <img src="../assets/images/fresh-apples.png" alt="Grocery" />
      </div>
    </div>
  </div>
</template>

<style scoped>
.hero {
  position: relative;
  z-index: 1;
  padding: 0 20px;
  margin-top: 4rem;
  margin-bottom: -4rem;
  border-radius: 2rem;
  overflow: hidden;
}

.hero::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  filter: blur(1px);
  background-image:
    linear-gradient(135deg, rgba(255, 244, 230, 0.7) 0%, rgba(255, 232, 204, 0.7) 100%),
    url("@/assets/images/showcase.png");
  background-size: cover;
  background-position: center;
  z-index: -1;
  transform: scale(1.02);
}
.hero > div {
  position: relative;
  z-index: 2;
  padding: 20px;
  padding-inline: 5rem;
}

.hero-container {
  width: 1425px;
  display: flex;
  align-items: center;
  justify-content: space-between;
  gap: 60px;
}

.hero-content h1 {
  font-size: 56px;
  font-weight: 700;
  color: #253D4E;
  margin-bottom: 15px;
  line-height: 1.2;
}

.hero-content p {
  font-size: 18px;
  color: #7E7E7E;
  margin-bottom: 30px;
}

.newsletter-form {
  display: flex;
  max-width: 450px;
}

.newsletter-form input {
  flex: 1;
  padding: 15px 20px;
  border: 1px solid #ececec;
  border-radius: 50px 0 0 50px;
  font-size: 14px;
}

.newsletter-form button {
  padding: 15px 30px;
  background: #3BB77E;
  color: white;
  border: none;
  border-radius: 0 50px 50px 0;
  cursor: pointer;
  font-weight: 600;
  transition: background 0.3s;
}

.newsletter-form button:hover {
  background: #2a9d68;
}

.hero-image img {
  width: 700px;
  height: auto;
  margin-top:-1.3rem;
}

@media (max-width: 968px) {
  .hero-container {
    flex-direction: column;
    text-align: center;
  }

  .hero-content h1 {
    font-size: 36px;
  }

  .newsletter-form {
    margin: 0 auto;
  }
}
</style>
