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
    p, ul, ol {
        margin-bottom: 15px;
        line-height: 1.6;
    }
    ul, ol {
        padding-left: 20px;
    }
    li {
        margin-bottom: 8px;
    }
    .important-note {
        background-color: #f8f8f8;
        border-left: 4px solid #eb6413;
        padding: 15px;
        margin: 20px 0;
    }
    .policy-table {
        width: 100%;
        border-collapse: collapse;
        margin: 20px 0;
    }
    .policy-table th {
        background-color: #229dd9;
        color: white;
        padding: 10px;
        text-align: left;
    }
    .policy-table td {
        padding: 10px;
        border-bottom: 1px solid #ddd;
    }
    .policy-table tr:nth-child(even) {
        background-color: #f2f2f2;
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
        <img src="https://tawseelonline.om/loadimg/img/logo.png" alt="Tawseel E-Commerce & Logistics Logo" style="height: 60px; vertical-align: middle;">
        <h1 style="display: inline; margin-left: 20px; vertical-align: middle;">Refund & Cancellation Policy</h1>
    </div>

    <div class="important-note">
        <p><strong>Scope:</strong> This policy covers all Tawseel E-Commerce & Logistics services including B2B, B2C, C2C marketplaces, and logistics operations, both domestic (Oman) and international.</p>
    </div>

    <h2>1. General Principles</h2>
    <ul>
        <li>All refunds processed in OMR (Omani Rial)</li>
        <li>Refund method matches original payment (credit card, bank transfer, etc.)</li>
        <li>Processing time: 3-14 business days after approval</li>
        <li>Currency conversion fees are non-refundable</li>
    </ul>

    <h2>2. Order Cancellation</h2>
    <h3>2.1 E-Commerce Orders</h3>
    <table class="policy-table">
        <tr>
            <th>Order Status</th>
            <th>Cancellation Policy</th>
            <th>Fees</th>
        </tr>
        <tr>
            <td>Pending Processing</td>
            <td>Full refund available</td>
            <td>None</td>
        </tr>
        <tr>
            <td>Processing</td>
            <td>Partial refund (items not prepared)</td>
            <td>10% processing fee</td>
        </tr>
        <tr>
            <td>Shipped</td>
            <td>Must follow return process</td>
            <td>Shipping fees non-refundable</td>
        </tr>
    </table>

    <h3>2.2 Logistics Services</h3>
    <table class="policy-table">
        <tr>
            <th>Service Type</th>
            <th>Cancellation Window</th>
            <th>Penalty</th>
        </tr>
        <tr>
            <td>1PL (Last-Mile)</td>
            <td>Up to 6 hours before pickup</td>
            <td>5% of service fee</td>
        </tr>
        <tr>
            <td>3PL Warehousing</td>
            <td>30-day written notice</td>
            <td>1 month storage fee</td>
        </tr>
        <tr>
            <td>International Shipping</td>
            <td>Before customs clearance</td>
            <td>15% + actual costs</td>
        </tr>
    </table>

    <h2>3. Returns & Refunds</h2>
    <h3>3.1 Return Policy</h3>
    <ul>
        <li><strong>Return Window:</strong> 14 days from delivery (domestic), 21 days (international)</li>
        <li><strong>Conditions:</strong> Unused, original packaging, with all tags</li>
        <li><strong>Return Process:</strong>
            <ol>
                <li>Submit request via "My Orders"</li>
                <li>Receive RMA number</li>
                <li>Ship with original packaging</li>
            </ol>
        </li>
    </ul>

    <h3>3.2 Non-Returnable Items</h3>
    <div class="important-note">
        <p>The following cannot be returned unless defective:</p>
        <ul>
            <li>Perishable goods (food, flowers)</li>
            <li>Personalized/custom products</li>
            <li>Software with broken seals</li>
            <li>Intimate apparel/swimwear</li>
        </ul>
    </div>

    <h2>4. Special Cases</h2>
    <h3>4.1 Damaged/Defective Items</h3>
    <ul>
        <li>Report within 48 hours of delivery</li>
        <li>Provide photo/video evidence</li>
        <li>Options: Replacement (preferred) or full refund</li>
    </ul>

    <h3>4.2 Late/Missing Deliveries</h3>
    <ul>
        <li>Domestic: Claim within 7 days of expected delivery</li>
        <li>International: Claim within 14 days</li>
        <li>Resolution: Reshipment or full refund</li>
    </ul>

    <h2>5. International Transactions</h2>
    <h3>5.1 Cross-Border Terms</h3>
    <table class="policy-table">
        <tr>
            <th>Service</th>
            <th>Coverage</th>
            <th>Delivery Time</th>
            <th>Incoterms®</th>
        </tr>
        <tr>
            <td>Standard</td>
            <td>GCC Countries</td>
            <td>10-15 business days</td>
            <td>DAP</td>
        </tr>
        <tr>
            <td>Express</td>
            <td>150+ countries</td>
            <td>3-7 business days</td>
            <td>DDP</td>
        </tr>
    </table>

    <h3>5.2 International Disputes</h3>
    <ol>
        <li>Direct negotiation (7 days)</li>
        <li>Tawseel E-Commerce & Logistics mediation (14 days)</li>
        <li>Escalation to:
            <ul>
                <li>Oman CBO (B2B)</li>
                <li>Card schemes (Visa/MC)</li>
                <li>ICC Arbitration (>50,000 OMR)</li>
            </ul>
        </li>
    </ol>

    <h2>6. Compliance Statements</h2>
    <div class="important-note">
        <p><strong>CBO Compliance:</strong> Meets Oman Commercial Business Ombudsman Guidelines 2023 (Articles 12-15)</p>
        <p><strong>Payment Schemes:</strong> Follows Visa/Mastercard Operating Regulations v5.2</p>
        <p><strong>Consumer Protection:</strong> Aligns with Oman Consumer Protection Law (Royal Decree 66/2014)</p>
    </div>

    <h2>7. Contact Information</h2>
    <table class="policy-table">
        <tr>
            <th>Service</th>
            <th>Contact</th>
            <th>Hours (GST)</th>
        </tr>
        <tr>
            <td>General Inquiries</td>
            <td>support@tawseelonline.om</td>
            <td>Sun-Thu, 8AM-6PM</td>
        </tr>
        <tr>
            <td>International Desk</td>
            <td>international@tawseelonline.om</td>
            <td>Sun-Thu, 8AM-4PM</td>
        </tr>
        <tr>
            <td>Dispute Resolution</td>
            <td>disputes@tawseelonline.om</td>
            <td>24/7 (Online Form)</td>
        </tr>
    </table>

    <div class="last-updated">
        <p>Last updated: 2025-05-20</p>
    </div>
</div>
<?= $this->endSection() ?>