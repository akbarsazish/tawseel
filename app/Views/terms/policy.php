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
        h3 {
            color: #333;
            margin-top: 20px;
            font-size: 18px;
        }
        p, ul {
            margin-bottom: 15px;
            line-height: 1.6;
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
        .highlight-box {
            background-color: #f8f9fa;
            border-left: 4px solid #229dd9;
            padding: 15px;
            margin: 20px 0;
        }
    </style>

<div class="container w3-white w3-padding">
    <div class="logo-container">
        <img src="<?=base_url('loadimg/img/logo.png')?>" alt="Tawseel E-Commerce & Logistics Logo" style="height: 60px; vertical-align: middle;">
        <h1 style="display: inline; margin-left: 20px; vertical-align: middle;">Privacy Policy</h1>
    </div>

    <div class="highlight-box">
        <p>This Privacy Policy governs all Tawseel E-Commerce & Logistics platforms including our e-commerce marketplaces (B2B, B2C, C2C) and logistics services.</p>
    </div>

    <h2>1. Information Collection</h2>
    <h3>1.1 Personal Information</h3>
    <p>We collect when you:</p>
    <ul>
        <li><strong>Register Individuals:</strong> Full name, email, phone, address
        <li><strong>Register Businesses:</strong> Commercial Registration Certificate, Identification Card, Chamber of Commerce, Tenancy Agreement, License Certificate, Tax Card Certificate, VAT Certificate
        <li><strong>Transact:</strong> Payment details (processed securely via OmanNet/PayFort through Sohar international bank), order history</li>
        <li><strong>Use Services:</strong> Location data (for deliveries), device information (IP address, browser type)</li>
    </ul>

    <h3>1.2 Automated Data</h3>
    <ul>
        <li><strong>Cookies:</strong> Session management, preferences, analytics (manage via browser settings)</li>
        <li><strong>Usage Data:</strong> Pages visited, click patterns, timestamps for service improvement</li>
    </ul>

    <h2>2. Data Usage</h2>
    <p>We use your information to:</p>
    <ul>
        <li>Process orders across B2B (wholesale), B2C (retail), and C2C (peer-to-peer) platforms</li>
        <li>Coordinate 1PL/2PL/3PL logistics services</li>
        <li>Prevent fraud (e.g., identity verification for C2C sellers)</li>
        <li>Send service notifications (order updates, delivery tracking)</li>
        <li>Improve our Services through analytics</li>
    </ul>

    <div class="highlight-box">
        <p><strong>Marketing:</strong> We only send promotions with your consent. Opt-out anytime via account settings or email footer.</p>
    </div>

    <h2>3. Data Sharing</h2>
    <h3>3.1 Service Providers</h3>
    <ul>
        <li><strong>Logistics Partners:</strong> Delivery agents receive only necessary order/delivery information</li>
        <li><strong>Payment Processors:</strong> Certified partners like Sohar international bank (we never store full card details)</li>
    </ul>

    <h3>3.2 Legal Requirements</h3>
    <p>We may disclose data when required by Omani law (e.g., tax authorities, fraud investigations).</p>

    <h2>4. Data Security</h2>
    <ul>
        <li><strong>Encryption:</strong> SSL/TLS for all data transmissions</li>
        <li><strong>Access Controls:</strong> Role-based employee access to sensitive data</li>
        <li><strong>Retention:</strong> Business data kept for 5 years (per Omani tax laws); personal data deleted upon request</li>
    </ul>

    <h2>5. Your Rights</h2>
    <p>Under Omani regulations, you can:</p>
    <ul>
        <li><strong>Access:</strong> Request a copy of your data via account settings</li>
        <li><strong>Correct:</strong> Update inaccurate information</li>
        <li><strong>Delete:</strong> Request erasure (exceptions apply for legal/compliance needs)</li>
        <li><strong>Object:</strong> Opt-out of specific processing (e.g., marketing)</li>
    </ul>

    <h2>6. Special Provisions</h2>
    <h3>6.1 For Merchants</h3>
    <ul>
        <li>Business documents are verified against government databases</li>
        <li>API integration data is encrypted end-to-end</li>
    </ul>

    <h3>6.2 For C2C Sellers</h3>
    <ul>
        <li>Identity verification required for high-value items</li>
        <li>Escrow protection for peer transactions</li>
    </ul>

    <h2>7. Policy Updates</h2>
    <p>We will notify users of material changes via:</p>
    <ul>
        <li>Email (registered users)</li>
        <li>Platform banners (30 days before)</li>
    </ul>

    <h2>8. Contact Us</h2>
    <p>For privacy requests or questions:</p>
    <ul>
        <li><strong>Email:</strong> info@tawseelonline.om</li>
        <li><strong>Phone:</strong> +968 99 63 4433</li>
        <li><strong>Address:</strong> Al Amarat Office No: 7820L, Building No: 7820 Muscat P.O. Box: 1513, MAF P.C: 116</li>
    </ul>

    <div class="last-updated">
        <p>Last updated: 2025-05-20</p>
    </div>
</div>
<?= $this->endSection() ?>