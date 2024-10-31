// api/speed-insights.js
import * as SpeedInsights from '@vercel/speed-insights';

console.log(SpeedInsights); // Log all exports to identify the correct function

export default async function handler(req, res) {
    const urls = [
        'https://andres-koljalg-portfolio-v4.vercel.app/',
        'https://andres-koljalg-portfolio-v4.vercel.app/api/journal.php',
        'https://andres-koljalg-portfolio-v4.vercel.app/api/projects.php',
        'https://andres-koljalg-portfolio-v4.vercel.app/contact.html'
    ];

    const devices = ['mobile', 'desktop'];

    try {
        const insightsPromises = [];
        urls.forEach(url => {
            devices.forEach(device => {
                insightsPromises.push(
                    getSpeedInsights({ url, device })
                        .then(data => ({ url, device, data }))
                        .catch(err => {
                            console.error(`Failed to get insights for ${url} on ${device}:`, err.message);
                            throw err;
                        })
                );
            });
        });

        const insights = await Promise.all(insightsPromises);

        const insightsByUrl = {};
        insights.forEach(({ url, device, data }) => {
            if (!insightsByUrl[url]) insightsByUrl[url] = {};
            insightsByUrl[url][device] = data;
        });

        res.status(200).json(insightsByUrl);
    } catch (error) {
        console.error("Handler Error:", error.message);
        res.status(500).json({ error: 'Failed to retrieve speed insights', details: error.message });
    }
}