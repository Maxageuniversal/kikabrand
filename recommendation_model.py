# recommendation_model.py
from sklearn.metrics.pairwise import cosine_similarity
import pandas as pd

# Mock user-item interaction data
data = {
    'user_id': [1, 2, 3, 1, 2],
    'product_id': [101, 102, 103, 102, 101],
    'interaction': [5, 3, 4, 2, 5]
}

df = pd.DataFrame(data)

# Pivot table to get matrix of users and their interactions with products
user_item_matrix = df.pivot_table(index='user_id', columns='product_id', values='interaction').fillna(0)

# Compute similarity using cosine similarity
similarity_matrix = cosine_similarity(user_item_matrix)

# Function to get recommendations
def get_recommendations(user_id):
    user_idx = user_id - 1  # Adjust for zero-based index
    similar_users = similarity_matrix[user_idx]
    return similar_users
