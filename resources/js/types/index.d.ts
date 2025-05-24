import type { PageProps } from '@inertiajs/core';
import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export interface SharedData extends PageProps {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;

    // Additional shared data
    categories?: Category[]; // List of categories
    products?: Product[]; // List of products
    orders?: Order[]; // List of orders
    wishlist?: Wishlist[]; // List of wishlist items
    checkout?: Checkout[]; // List of checkout entries
    cart?: Cart[]; // List of cart items
}

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface Category {
    id: number;
    name: string;
    createdAt: Date;
    updatedAt: Date;
}

// Interface for the 'products' table
export interface Product {
    id: number;
    categoryId: number;
    name: string;
    description?: string | null;
    image?: string | null;
    quantity: number;
    price: number;
    salePrice?: number | null;
    createdAt: Date;
    updatedAt: Date;
}

// Interface for the 'orders' table
export interface Order {
    id: number;
    userId: number;
    productId: number;
    createdAt: Date;
    updatedAt: Date;
}

// Interface for the 'wishlist' table
export interface Wishlist {
    id: number;
    productId: number;
    userId: number;
    createdAt: Date;
    updatedAt: Date;
}

// Interface for the 'checkout' table
export interface Checkout {
    id: number;
    userId: number;
    orderId: number;
    createdAt: Date;
    updatedAt: Date;
}

// Interface for the 'cart' table
export interface Cart {
    id: number;
    productId: number;
    userId: number;
    quantity: number;
    createdAt: Date;
    updatedAt: Date;
}

export type BreadcrumbItemType = BreadcrumbItem;
