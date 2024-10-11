# app.py (Python)

from flask import Flask, request, jsonify
import pandas as pd
from sklearn.neighbors import NearestNeighbors

app = Flask(__name__)

# Sample product data for recommendations
products = pd.DataFrame({
    'product_id': [1, 2, 3, 4, 5],
    'category': ['necklace', 'bracelet', 'ring', 'earring', 'anklet'],
    'price': [20, 30, 15, 25, 35]
})

# Training a basic nearest neighbors model
def recommend_products(user_data):
    model = NearestNeighbors(n_neighbors=2)
    model.fit(products[['price']])
    distances, indices = model.kneighbors([[user_data['price']]])
    recommendations = products.iloc[indices[0]].to_dict(orient='records')
    return recommendations

@app.route('/recommend', methods=['POST'])
def recommend():
    user_data = request.json
    recommended_products = recommend_products(user_data)
    return jsonify(recommended_products)

if __name__ == '__main__':
    app.run(debug=True)
