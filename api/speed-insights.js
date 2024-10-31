// api/speed-insights.js
import { getEdgeSpeedInsights } from '@vercel/edge-speed-insights';

export default async function handler(req, res) {
    // Define the pages you want to track
    const urls = [
        'https://andres-koljalg-portfolio-v4.vercel.app/',
        'https://andres-koljalg-portfolio-v4.vercel.app/api/journal.php',
        'https://andres-koljalg-portfolio-v4.vercel.app/api/projects.php',
        'https://andres-koljalg-portfolio-v4.vercel.app/contact.html'
    ];

    // Define devices to track: both 'mobile' and 'desktop'
    const devices = ['mobile', 'desktop'];

    try {
        // Collect insights for each URL and device combination
        const insightsPromises = [];
        urls.forEach(url => {
            devices.forEach(device => {
                insightsPromises.push(
                    getEdgeSpeedInsights({ url, device }).then(data => ({ url, device, data }))
                );
            });
        });

        const insights = await Promise.all(insightsPromises);

        // Structure the insights by URL and device
        const insightsByUrl = {};
        insights.forEach(({ url, device, data }) => {
            if (!insightsByUrl[url]) insightsByUrl[url] = {};
            insightsByUrl[url][device] = data;
        });

        // Return the insights for all URLs and devices
        res.status(200).json(insightsByUrl);
    } catch (error) {
        res.status(500).json({ error: 'Failed to retrieve speed insights', details: error.message });
    }
}