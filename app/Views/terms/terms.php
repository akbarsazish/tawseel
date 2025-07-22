<?= $this->extend('other') ?>
<?= $this->section('title') ?>
    <?= lang('app.title') ?>
<?= $this->endSection() ?>

<?= $this->section('content') ?>
<style>
    .logo-container {
        text-align: center;
        margin-bottom: 30px;
    }
    .logo-container img {
        max-width: 200px;
        height: auto;
    }
    h1 {
        color: #229dd9;
        text-align: center;
        margin-bottom: 30px;
        font-size: 28px;
    }
    h2 {
        color: #eb6413;
        margin-top: 25px;
        font-size: 22px;
        border-bottom: 2px solid #229dd9;
        padding-bottom: 5px;
    }
    p, ul {
        margin-bottom: 15px;
    }
    ul {
        padding-left: 20px;
    }
    li {
        margin-bottom: 8px;
    }
    .last-updated {
        text-align: right;
        font-style: italic;
        color: #666;
        margin-top: 40px;
    }
</style>

<div class="container w3-white w3-padding">
    <div class="logo-container">
        <img src="<?=base_url('loadimg/img/logo.png')?>" alt="Tawseel E-Commerce & Logistics Logo" style="height: 60px; vertical-align: middle;">
        <h1 style="display: inline; margin-left: 20px; vertical-align: middle;">Terms and Conditions</h1>
    </div>  
    
    <p>Welcome to Tawseel E-Commerce & Logistics! Please read the following Terms and Conditions ("Terms") carefully before using our services. By accessing or using the Tawseel E-Commerce & Logistics platform, you agree to comply with and be bound by these Terms.</p>

    <h2>1. Acceptance of Terms</h2>
    <p>By using our websites or mobile applications, you agree to these Terms and our Privacy Policy. If you do not agree, please discontinue use immediately.</p>

    <h2>2. Definitions</h2>
    <ul>
        <li><strong>"Platform"</strong>: Websites and mobile apps operated by Tawseel E-Commerce & Logistics (E-commerce & Logistics)</li>
        <li><strong>"User"</strong>: Any individual or business accessing or transacting on the platform</li>
        <li><strong>"Services"</strong>: Includes e-commerce marketplace (B2B, B2C, C2C), logistics (1PL, 2PL, 3/4PL), and related services</li>
    </ul>

    <h2>3. Account Registration</h2>
    <p><strong>For Consumers:</strong></p>
    <ul>
        <li>Must provide accurate information</li>
        <li>Responsible for maintaining account confidentiality</li>
    </ul>
    <p><strong>For Businesses:</strong> Must submit valid documentation including:</p>
    <ul>
        <li>Commercial Registration Certificate</li>
        <li>Identification Card</li>
        <li>Chamber of Commerce Certificate</li>
        <li>Tenancy Agreement</li>
        <li>License Certificate</li>
        <li>Tax Card Certificate</li>
        <li>VAT Certificate</li>
    </ul>
    <p>We reserve the right to verify all documentation and suspend accounts if necessary.</p>

    <h2>4. Platform Usage</h2>
    <p><strong>Permitted Use:</strong> Browse, purchase, or sell products; use logistics services internationally.</p>
    <p><strong>Prohibited Conduct:</strong></p>
    <ul>
        <li>Posting false or illegal content</li>
        <li>Bypassing transaction systems</li>
        <li>Reverse-engineering or scraping platform data</li>
    </ul>

    <h2>5. Transactions & Payments</h2>
    <ul>
        <li><strong>Buyers:</strong> Can browse and purchase; pay via card, bank transfer, or COD</li>
        <li><strong>Sellers:</strong> Subject to commissions per our Fee Policy</li>
        <li><strong>Disputes:</strong> Must be resolved between users; Tawseel E-Commerce & Logistics may mediate but is not liable</li>
    </ul>

    <h2>6. E-Commerce services</h2>
    <ul>
        <li><strong>B2B:</strong> Business-to-Business</li>
        <li><strong>B2C:</strong> Business-to-Consumer</li>
        <li><strong>C2C:</strong> Consumer-to-Consumer</li>
    </ul>

    <h2>7. Logistics Services</h2>
    <ul>
        <li><strong>1PL:</strong> Seller-managed inventory with Tawseel E-Commerce & Logistics delivery</li>
        <li><strong>2PL:</strong> Dedicated transportation</li>
        <li><strong>3PL/4PL:</strong> Full supply chain (warehousing to delivery)</li>
    </ul>    
    <p>All delivery timelines are estimates. We are not liable for external delays.</p>

    <h2>8. Intellectual Property</h2>
    <p>All content (logos, graphics, code) belongs to Tawseel E-Commerce & Logistics or its licensors. By uploading content, users grant us a non-exclusive license to use it for platform functionality.</p>

    <h2>9. Privacy & Data</h2>
    <p>All data is handled per our <a href="<?= base_url('privacy-policy') ?>">Privacy Policy</a>. We may share data with logistics providers or Omani authorities if required.</p>

    <h2>10. Limitation of Liability</h2>
    <p>Tawseel E-Commerce & Logistics acts as an intermediary and is not responsible for:</p>
    <ul>
        <li>Product quality issues</li>
        <li>Buyer-seller disputes</li>
        <li>Third-party services</li>
        <li>Unauthorized account access due to user negligence</li>
    </ul>
    <p>Our liability is limited to the value of the disputed transaction.</p>

    <h2>11. Termination</h2>
    <p>We may suspend or terminate any account for violations, fraud, or prolonged inactivity (12+ months).</p>

    <h2>12. Governing Law</h2>
    <p>These Terms are governed by the laws of the Sultanate of Oman. All disputes are subject to the jurisdiction of Omani courts.</p>

    <h2>13. Amendments</h2>
    <p>We reserve the right to update these Terms. Continued use of the platform after changes indicates acceptance.</p>

    <div class="last-updated">
        <p>Last updated: 2025-05-20</p>
    </div>
</div>

<?= $this->endSection() ?>
